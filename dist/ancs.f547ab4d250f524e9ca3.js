!function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=19)}({19:function(e,t,n){"use strict";n.r(t);n(70);var r=document.getElementById("sine-wave-canvas"),i=r.getContext("2d"),o=[{amplitude:30,frequency:.02,phaseOffset:.2,angleOffset:0},{amplitude:40,frequency:.03,phaseOffset:.5,angleOffset:30},{amplitude:20,frequency:.04,phaseOffset:1,angleOffset:60}],f=0;!function e(){r.width=window.innerWidth,window.innerWidth<1280?r.height=window.innerHeight:r.height=window.innerHeight/3,i.clearRect(0,0,r.width,r.height),o.forEach((function(e){var t=e.amplitude,n=e.frequency,o=e.phaseOffset;e.angleOffset;i.beginPath(),i.moveTo(0,r.height/2);for(var u=0;u<r.width;u++){var a=t*Math.sin(n*u+o+f)+r.height/2;i.lineTo(u,a)}i.strokeStyle="#FFFFFF",i.lineWidth=2,i.stroke(),i.closePath(),f+=.005})),requestAnimationFrame(e)}()},70:function(e,t){}});