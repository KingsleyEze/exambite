// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 2.6
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.fn.wowSlider=function(y){var E=jQuery;var l=this;var i=l.get(0);y=E.extend({effect:function(){this.go=function(c,d){b(c);return c}},prev:"",next:"",duration:1000,delay:20*100,captionDuration:1000,captionEffect:0,width:960,height:360,caption:true,controls:true,autoPlay:true,bullets:true,stopOnHover:0,preventCopy:1},y);var a=E(".ws_images",l);var J=a.find("ul");function b(c){J.css({left:-c+"00%"})}E("<div>").css({width:"100%",visibility:"hidden","font-size":0,"line-height":0}).append(a.find("li:first img:first").clone().css({width:"100%"})).prependTo(a);J.css({position:"absolute",top:0,animation:"none","-moz-animation":"none","-webkit-animation":"none"});var r=y.images&&(new wowsliderPreloader(this,y));var j=a.find("li");var C=j.length;function x(c){return((c||0)+C)%C}var u=navigator.userAgent;if((E.browser.msie&&parseInt(E.browser.version,10)<8)||(/Safari/.test(u))){var P=Math.pow(10,Math.ceil(Math.LOG10E*Math.log(C)));J.css({width:P+"00%"});j.css({width:100/P+"%"})}else{J.css({width:C+"00%",display:"table"});j.css({display:"table-cell","float":"none",width:"auto"})}var A=y.onBeforeStep||function(c){return c+1};y.startSlide=x(isNaN(y.startSlide)?A(-1,C):y.startSlide);b(y.startSlide);var G;if(y.preventCopy&&!/iPhone/.test(navigator.platform)){G=E('<div><a href="#" style="display:none;position:absolute;left:0;top:0;width:100%;height:100%"></a></div>').css({position:"absolute",left:0,top:0,width:"100%",height:"100%","z-index":10,visibility:"hidden",background:"#FFF",opacity:0}).appendTo(l).find("A").get(0)}var h=[];j.each(function(c){var f=E(">img:first,>a:first,>div:first",this).get(0);var Z=E("<div></div>");for(var d=0;d<this.childNodes.length;){if(this.childNodes[d]!=f){Z.append(this.childNodes[d])}else{d++}}if(!E(this).data("descr")){E(this).data("descr",Z.html().replace(/^\s+|\s+$/g,""))}E(this).css({"font-size":0});h[h.length]=E(">a>img",this).get(0)||E(">*",this).get(0)});h=E(h);h.css("visibility","visible");if(typeof y.effect=="string"){y.effect=window["ws_"+y.effect]}var O=new y.effect(y,h,a);var B=y.startSlide;function k(f,d,c){if(isNaN(f)){f=A(B,C)}f=x(f);if(B==f){return}if(r){r.load(f,function(){s(f,d,c)})}else{s(f,d,c)}}function U(f){var d="";for(var c=0;c<f.length;c++){d+=String.fromCharCode(f.charCodeAt(c)^(1+(f.length-c)%32))}return d}y.loop=y.loop||Number.MAX_VALUE;y.stopOn=x(y.stopOn);function s(f,d,c){var f=O.go(f,B,d,c);if(f<0){return}q(f);if(y.caption){z(j[f])}B=f;if(B==y.stopOn&&!--y.loop){y.autoPlay=0}D();if(y.onStep){y.onStep(f)}}function Q(f,d,c){new S(f,d,c)}function S(ab,f,Z){var d,c,aa=0;if(ab.addEventListener){ab.addEventListener("touchmove",function(ac){if(aa){if(f(ac,d-ac.touches[0].pageX,c-ac.touches[0].pageY)){d=c=aa=0}}return false},false);ab.addEventListener("touchstart",function(ac){if(ac.touches.length==1){d=ac.touches[0].pageX;c=ac.touches[0].pageY;aa=1;if(Z){Z(ac)}}else{aa=0}},false);ab.addEventListener("touchend",function(ac){aa=0},false)}}var Y=a,e="YB[Xf`lbt+glo";if(!e){return}e=U(e);if(!e){return}else{Q(G?G.parentNode:a.get(0),function(f,d,c){if((Math.abs(d)>20)||(Math.abs(c)>20)){X(f,B+((d+c)>0?1:-1),d/20,c/20);return 1}return 0})}var m=l.find(".ws_bullets");var M=l.find(".ws_thumbs");function q(d){if(m.length){R(d)}if(M.length){H(d)}if(G){var c=E("A",j.get(d)).get(0);if(c){G.setAttribute("href",c.href);G.setAttribute("target",c.target);G.style.display="block"}else{G.style.display="none"}}}var o;function D(c){p();if(y.autoPlay){o=setTimeout(function(){k()},y.delay+(c?0:y.duration))}}function p(){if(o){clearTimeout(o)}o=null}function X(Z,f,d,c){p();Z.preventDefault();k(f,d,c);D()}var K=Y||document.body;e=e.replace(/^\s+|\s+$/g,"");Y=e?E("<div>"):0;E(Y).css({position:"absolute",padding:"0 0 0 0",visibility:"hidden"}).appendTo(K);if(Y&&document.all){var T=E('<iframe src="javascript:false"></iframe>');T.css({position:"absolute",left:0,top:0,width:"100%",height:"100%",filter:"alpha(opacity=0)"});T.attr({scrolling:"no",framespacing:0,border:0,frameBorder:"no"});Y.append(T)}E(Y).css({zIndex:10,right:"5px",bottom:"2px"}).appendTo(K);var W=Y?E("<A>"):Y;if(W){W.css({position:"relative",display:"block","background-color":"#E4EFEB",color:"#837F80","font-family":"Lucida Grande,sans-serif","font-size":"11px","font-weight":"normal","font-style":"normal","-moz-border-radius":"5px","border-radius":"5px",padding:"1px 5px",width:"auto",height:"auto",margin:"0 0 0 0",outline:"none"}).attr({href:"http://"+e.toLowerCase()}).html(e).bind("contextmenu",function(c){return false}).appendTo(Y||document.body)}if(y.controls){var v=E('<a href="#" class="ws_next">'+y.next+"</a>");var V=E('<a href="#" class="ws_prev">'+y.prev+"</a>");l.append(v);l.append(V);v.bind("click",function(c){X(c,B+1)});V.bind("click",function(c){X(c,B-1)});if(/iPhone/.test(navigator.platform)){V.get(0).addEventListener("touchend",function(c){X(c,B-1)},false);v.get(0).addEventListener("touchend",function(c){X(c,B+1)},false)}}var F;function g(){l.find(".ws_bullets a,.ws_thumbs a").click(function(ah){X(ah,E(this).index())});if(M.length){M.hover(function(){F=1},function(){F=0});var ad=M.find(">div");M.css({overflow:"hidden"});M.mousemove(function(ak){var am=0.1;for(var aj=0;aj<2;aj++){var ai=M[aj?"width":"height"](),ah=ad[aj?"width":"height"](),al=ai-ah;if(al<0){al*=Math.min(Math.max(((ak[aj?"pageX":"pageY"]-M.offset()[aj?"left":"top"])/ai-am)/(1-2*am),0),1);ad.stop(true).animate(aj?{left:al}:{top:al},ah/2,"easeOutCubic")}else{ad.css(aj?"left":"top",aj?al/2:0)}}});M.trigger("mousemove");var aa,ab;Q(ad.get(0),function(aj,ai,ah){ad.css("left",Math.min(Math.max(aa-ai,M.width()-ad.width()),0));ad.css("top",Math.min(Math.max(ab-ah,M.height()-ad.height()),0));aj.preventDefault();return false},function(ah){aa=parseFloat(ad.css("left"))||0;ab=parseFloat(ad.css("top"))||0;return false})}if(m.length){var ag=m.find(">div");var ae=E("a",m);var f=ae.find("IMG");if(f.length){var Z=E('<div class="ws_bulframe"/>').appendTo(ag);var d=E("<div/>").css({width:f.length+1+"00%"}).appendTo(E("<div/>").appendTo(Z));f.appendTo(d);E("<span/>").appendTo(Z);var c=-1;function ac(aj){if(aj<0){aj=0}if(r){r.loadTtip(aj)}E(ae.get(c)).removeClass("ws_overbull");E(ae.get(aj)).addClass("ws_overbull");Z.show();var ak={left:ae.get(aj).offsetLeft-Z.width()/2,"margin-top":ae.get(aj).offsetTop-ae.get(0).offsetTop+"px","margin-bottom":-ae.get(aj).offsetTop+ae.get(ae.length-1).offsetTop+"px"};var ai=f.get(aj);var ah={left:-ai.offsetLeft+(E(ai).outerWidth(true)-E(ai).outerWidth())/2};if(c<0){Z.css(ak);d.css(ah)}else{if(!document.all){ak.opacity=1}Z.stop().animate(ak,"fast");d.stop().animate(ah,"fast")}c=aj}ae.hover(function(){ac(E(this).index())});var af;ag.hover(function(){if(af){clearTimeout(af);af=0}ac(c)},function(){ae.removeClass("ws_overbull");if(document.all){if(!af){af=setTimeout(function(){Z.hide();af=0},400)}}else{Z.stop().animate({opacity:0},{duration:"fast",complete:function(){Z.hide()}})}});ag.click(function(ah){X(ah,E(ah.target).index())})}}}function H(c){E("A",M).each(function(aa){if(aa==c){var f=E(this);f.addClass("ws_selthumb");if(!F){var d=M.find(">div"),Z=f.position()||{},ab=d.position()||{};d.stop(true).animate({left:-Math.max(Math.min(Z.left,-ab.left),Z.left+f.width()-M.width()),top:-Math.max(Math.min(Z.top,-ab.top),Z.top+f.height()-M.height())})}}else{E(this).removeClass("ws_selthumb")}})}function R(c){E("A",m).each(function(d){if(d==c){E(this).addClass("ws_selbull")}else{E(this).removeClass("ws_selbull")}})}if(y.caption){$caption=E("<div class='ws-title' style='display:none'></div>");l.append($caption);$caption.bind("mouseover",function(c){p()});$caption.bind("mouseout",function(c){D()})}var L=y.captionEffect||"slide";if(L=="move"){L=[{left1:"100%",top2:"100%"},{left1:"80%",left2:"-50%"},{top1:"-100%",top2:"100%",distance:0.7,easing:"easeOutBack"},{top1:"-80%",top2:"-80%",distance:0.3,easing:"easeOutBack"},{top1:"-80%",left2:"80%"},{left1:"80%",left2:"80%"}]}function z(d){var Z=E("img",d).attr("title");var f=E(d).data("descr");var c=E(".ws-title",l);c.stop(1,1).stop(1,1).fadeOut(y.captionDuration/3,function(){if(Z||f){c.html((Z?"<span>"+Z+"</span>":"")+(f?"<div>"+f+"</div>":""));if(L=="slide"){N(c,{direction:"left",easing:"easeInOutExpo",complete:function(){if(E.browser.msie){c.get(0).style.removeAttribute("filter")}},duration:y.captionDuration})}else{n(c,L[Math.floor(Math.random()*L.length)],0.5,"easeOutElastic1",y.captionDuration)}}})}if(m.length||M.length){g()}q(B);if(y.caption){z(j[B])}if(y.stopOnHover){this.bind("mouseover",function(c){p()});this.bind("mouseout",function(c){D()})}D(1);function I(aa,d){var ab,f=document.defaultView;if(f&&f.getComputedStyle){var Z=f.getComputedStyle(aa,"");if(Z){ab=Z.getPropertyValue(d)}}else{var c=d.replace(/\-\w/g,function(ac){return ac.charAt(1).toUpperCase()});if(aa.currentStyle){ab=aa.currentStyle[c]}else{ab=aa.style[c]}}return ab}function w(Z,f,ac){var ab="padding-left|padding-right|border-left-width|border-right-width".split("|");var aa=0;for(var d=0;d<ab.length;d++){aa+=parseFloat(I(Z,ab[d]))||0}var c=parseFloat(I(Z,"width"))||((Z.offsetWidth||0)-aa);if(f){c+=aa}if(ac){c+=(parseFloat(I(Z,"margin-left"))||0)+(parseFloat(I(Z,"margin-right"))||0)}return c}function t(Z,f,ac){var ab="padding-top|padding-bottom|border-top-width|border-bottom-width".split("|");var aa=0;for(var d=0;d<ab.length;d++){aa+=parseFloat(I(Z,ab[d]))||0}var c=parseFloat(I(Z,"height"))||((Z.offsetHeight||0)-aa);if(f){c+=aa}if(ac){c+=(parseFloat(I(Z,"margin-top"))||0)+(parseFloat(I(Z,"margin-bottom"))||0)}return c}function n(aa,ae,c,ac,f){var Z=aa.find(">span,>div").get();E(Z).css({position:"relative",visibility:"hidden"});aa.show();for(var d in ae){if(/\%/.test(ae[d])){ae[d]=parseInt(ae[d])/100;var ad=aa.offset()[/left/.test(d)?"left":"top"];var af=/left/.test(d)?"width":"height";if(ae[d]<0){ae[d]*=ad}else{ae[d]*=l[af]()-aa[af]()-ad}}}E(Z[0]).css({left:(ae.left1||0)+"px",top:(ae.top1||0)+"px"});E(Z[1]).css({left:(ae.left2||0)+"px",top:(ae.top2||0)+"px"});var f=ae.duration||f;function ab(ag){var ah=E(Z[ag]).css("opacity");E(Z[ag]).css({opacity:0,visibility:"visible"}).animate({opacity:ah},f,"easeOutCirc").animate({top:0,left:0},{duration:f,easing:(ae.easing||ac),queue:false})}ab(0);setTimeout(function(){ab(1)},f*(ae.distance||c))}function N(ad,ag){var af={position:0,top:0,left:0,bottom:0,right:0};for(var f in af){af[f]=ad.get(0).style[f]}ad.show();var ac={width:w(ad.get(0),1,1),height:t(ad.get(0),1,1),"float":ad.css("float"),overflow:"hidden",opacity:0};for(var f in af){ac[f]=af[f]||I(ad.get(0),f)}var d=E("<div></div>").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0});ad.wrap(d);d=ad.parent();if(ad.css("position")=="static"){d.css({position:"relative"});ad.css({position:"relative"})}else{E.extend(ac,{position:ad.css("position"),zIndex:ad.css("z-index")});ad.css({position:"absolute",top:0,left:0,right:"auto",bottom:"auto"})}d.css(ac).show();var ae=ag.direction||"left";var Z=(ae=="up"||ae=="down")?"top":"left";var aa=(ae=="up"||ae=="left");var c=ag.distance||(Z=="top"?ad.outerHeight({margin:true}):ad.outerWidth({margin:true}));ad.css(Z,aa?(isNaN(c)?"-"+c:-c):c);var ab={};ab[Z]=(aa?"+=":"-=")+c;d.animate({opacity:1},{duration:ag.duration,easing:ag.easing});ad.animate(ab,{queue:false,duration:ag.duration,easing:ag.easing,complete:function(){ad.css(af);ad.parent().replaceWith(ad);if(ag.complete){ag.complete()}}})}i.wsStart=k;i.wsStop=p;return this};jQuery.extend(jQuery.easing,{easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeOutElastic1:function(k,l,i,h,g){var f=Math.PI/2;var m=1.70158;var e=0;var j=h;if(l==0){return i}if((l/=g)==1){return i+h}if(!e){e=g*0.3}if(j<Math.abs(h)){j=h;var m=e/4}else{var m=e/f*Math.asin(h/j)}return j*Math.pow(2,-10*l)*Math.sin((l*g-m)*f/e)+h+i},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a}});