(window.webpackJsonp_bluehost_wordpress_plugin=window.webpackJsonp_bluehost_wordpress_plugin||[]).push([[22],{140:function(e,t,n){"use strict";n.d(t,"c",(function(){return m})),n.d(t,"b",(function(){return v})),n.d(t,"d",(function(){return g})),n.d(t,"a",(function(){return y}));var o=n(9),r=n.n(o),c=n(135),u=n.n(c),i=n(1),s=n(18),a=n.n(s),l=(n(39),n(15)),f=n(152),d=n(5),p=n(11),b=n(2),w=n(16),O=n.n(w),j=n(34);function h(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}var m=function(){var e=u()(a.a.mark((function e(t){return a.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(null!==document.querySelector(t)){e.next=5;break}return e.next=3,new Promise((function(e){return requestAnimationFrame(e)}));case 3:e.next=0;break;case 5:return e.abrupt("return",document.querySelector(t));case 6:case"end":return e.stop()}}),e)})));return function(_x){return e.apply(this,arguments)}}(),v=function(e,t,n){var o=g(e,t);return o&&(e[o]=Object(d.merge)(e[o],n)),e},g=function(e,t){var n=Object(d.findIndex)(e,{id:t});return-1!==n&&n},y=function(e){var t=e.type,n=e.steps,o=e.options,c=void 0===o?{}:o,u=Object(d.merge)({defaultStepOptions:{cancelIcon:{enabled:!0}},useModalOverlay:!0},function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?h(Object(n),!0).forEach((function(t){r()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):h(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({type:t},c));return Object(i.createElement)(f.a,{steps:n,tourOptions:u},Object(i.createElement)((function(){return window.nfTour=Object(i.useContext)(f.b),function(e,t){Object(j.b)();var n,o=function(){jQuery("a.newfold-tour-relauncher").on("click",(function(e){e.preventDefault(),t.start()}))};(n=document.getElementById("newfold-editortours-loading"))&&(Object(j.c)(),n.classList.add("loaded"));var r=function(e,t){var n={action:"tour-"+e.tour.options.type,category:t,data:{step:e.id}};O()({path:"/bluehost/v1/notifications/events",method:"POST",data:n})},c={id:"newfold-tour-notice",actions:[{url:"#",label:Object(b.__)("Reopen Tour","bluehost-wordpress-plugin"),className:"newfold-tour-relauncher"}]},u=Object(d.capitalize)(t.options.type);t.on("active",(function(){Object(p.dispatch)("core/notices").removeNotice("newfold-tour-notice")})),t.on("show",(function(e){r(e,"show")})),t.on("hide",(function(){Object(p.dispatch)("core/notices").createInfoNotice(u+" "+Object(b.__)("Page tour closed.","bluehost-wordpress-plugin"),c).then((function(){o()}))})),t.on("complete",(function(e){r(e,"complete"),Object(p.dispatch)("core/notices").createSuccessNotice(u+" "+Object(b.__)("Page tour is complete!","bluehost-wordpress-plugin"),c).then((function(){o()}))})),t.on("cancel",(function(e){r(e,"cancel"),Object(p.dispatch)("core/notices").createInfoNotice(u+" "+Object(b.__)("Page tour closed. You can restart it below.","bluehost-wordpress-plugin"),c).then((function(){o()}))}))}(0,window.nfTour),window.nfTourContext===Object(l.getQueryArg)(window.location.href,"tour")?Object(i.createElement)(i.Fragment,null,window.nfTour.start()):Object(i.createElement)(i.Fragment,null)}),null))}},229:function(e,t,n){"use strict";n.r(t),n.d(t,"ContactTour",(function(){return d}));var o=n(4),r=n.n(o),c=n(1),u=n(16),i=n.n(u),s=n(15),a=n(11),l=n(5),f=n(140),d=function(){var e=Object(c.useState)(!1),t=r()(e,2),n=t[0],o=t[1],u=Object(c.useState)([]),d=r()(u,2),p=d[0],b=d[1],w=Object(s.addQueryArgs)("/newfold/v1/tours/blockeditor",{type:"contact",brand:"bluehost",lang:"en-us"});return Object(c.useEffect)((function(){i()({path:w}).then((function(e){b(function(e){var t=e,n=document.querySelector("li.toplevel_page_wpforms-overview");return t=Object(f.b)(t,"show-wpforms-link",{beforeShowPromise:function(){return new Promise((function(e){var t=Object(a.select)("core/edit-post").isFeatureActive("fullscreenMode");window.nfOverrideFullscreen=!1,t?Object(a.dispatch)("core/edit-post").toggleFeature("fullscreenMode").then((function(){window.nfOverrideFullscreen=!0,e()})):e()}))}}),t=Object(f.b)(t,"show-wpforms-menu",{beforeShowPromise:function(){return new Promise((function(e){n.classList.add("opensub"),e()}))},when:{hide:function(){n.classList.remove("opensub"),!0===window.nfOverrideFullscreen&&Object(a.dispatch)("core/edit-post").toggleFeature("fullscreenMode")}}}),Object(f.b)(t,"final-polish",{beforeShowPromise:function(){return new Promise((function(e){var t=Object(l.filter)(Object(a.select)("core/block-editor").getBlocks(),["name","wpforms/form-selector"]);Object(l.isEmpty)(t)?e():Object(a.dispatch)("core/block-editor").selectBlock(t[0].clientId).then((function(){e()}))}))}})}(e)),o(!0)}))}),[]),!!n&&Object(c.createElement)(f.a,{type:"contact",steps:p})};t.default=d}}]);