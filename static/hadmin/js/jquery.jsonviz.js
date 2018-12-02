(function($){
   $.fn.jsonviz = function(json) {
     
     wrappers = {};
     wrappers.object = $('<li  class="empty list"><ul class="object"><span class="collapse"></span><span class="ellipsis">&hellip;</span></ul></li>');
     wrappers.key_value = $('<li><span class="key"></span>: <span class="value"></span></li>');
     wrappers.array = $('<li  class="empty list"><ul class="array"><span class="collapse"></span><span class="ellipsis">&hellip;</span></ul></li');
     wrappers.ul = $('<ul>');
     wrappers.li = $('<li>');
     wrappers.span = $('<span>');
     
     
     functions = {};
     functions.object = function(o, no_li){
         
         // type of null is object, so it gets handled here
         if(o === null){
             return functions['null'](o, no_li);
         }
         // dates are objects
         if(o instanceof Date){
             return functions.date(o);
         }
         // arrays are objects too
         if($.isArray(o)){
             return functions.array(o);
         }
         
         // If other checks haven't caught o it must be a key:value object
         var response = wrappers.object.clone();
         $.each(o, function(k, v){
             // remove class of empty as soon as there's a child
             response.removeClass('empty');
             
             var kv = wrappers.key_value.clone();
             kv.children('.key').append(functions[typeof(k)](k, true));
             kv.children('.value').append(functions[typeof(v)](v, true));
             response.children('ul').append(kv);
     
         });
         return response;
     };
     functions.array = function(o){
         var response = wrappers.array.clone();
         $.each(o, function(i, v){
             response.removeClass('empty');
             response.children('ul').append(functions[typeof(v)](v));
         });
         return response;
     };
     // this function handles types which could be a key in an object and
     // therefore need to not have a <li> wrapper. string, null, number and
     // boolean extend this
     functions.key = function(o, type, no_li){
         inner = wrappers.span.clone().addClass(type).text(o);
         if(no_li){
             return inner;
         }
         return wrappers.li.clone().append(inner);
     };
     functions['null'] = function(o, no_li){
         return functions.key('null', 'null', no_li);
     };
     functions.date = function(o, no_li){
         return functions.key(o.toString(), 'date', no_li);
     };
     functions.string = function(o, no_li){
         return functions.key(o, 'string', no_li)
     };
     functions.number = function(o, no_li){
         return functions.key(o, 'number', no_li);
     };
     functions.boolean = function(o, no_li){
         return functions.key((o && 'true' || 'false'), 'boolean', no_li);
     };
 
     if(typeof(json) == 'string'){
         json = $.parseJSON(json);
     }
     this.append(functions[typeof(json)](json, true));
       
     this.addClass('jsonviz');
       
     this.find('.collapse, .ellipsis').click(function(e){
         e.stopPropagation();
         $(this).parent().toggleClass('closed').children('li').slideToggle();
     });
 
   };
 })( jQuery );