$(function(t){var e,n;return e=!1,n=300,t("body").click(function(){return e?e.velocity({opacity:0,translateY:-10},{duration:n,complete:function(){return e.hide(),e=!1}}):void 0}),t("[data-toggle]").click(function(r){var i,o,a,s,l,u,c;return r.preventDefault(),o=t(this),i=t(o.data("toggle")),a=void 0===o.data("y")?20:o.data("y"),l={translateY:-10,opacity:0},c={translateY:0,opacity:1},u=function(){},s=function(){},i.click(function(t){return t.stopPropagation()}),i.is(":visible")?i.velocity(l,{duration:n,complete:function(){return i.hide()}}):i.show().velocity(l,0).velocity(c,{duration:n,complete:function(){return e=i}})});});
