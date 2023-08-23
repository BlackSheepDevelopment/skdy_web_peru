/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/entries/ancs.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/entries/ancs.js":
/*!*****************************!*\
  !*** ./src/entries/ancs.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scss_ancs_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../scss/ancs.scss */ \"./src/scss/ancs.scss\");\n/* harmony import */ var _scss_ancs_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_scss_ancs_scss__WEBPACK_IMPORTED_MODULE_0__);\n\nvar canvas = document.getElementById(\"sine-wave-canvas\");\nvar ctx = canvas.getContext(\"2d\");\nvar waveConfigs = [{\n  amplitude: 30,\n  frequency: 0.02,\n  phaseOffset: 0.2,\n  angleOffset: 0\n}, {\n  amplitude: 40,\n  frequency: 0.03,\n  phaseOffset: 0.5,\n  angleOffset: 30\n}, {\n  amplitude: 20,\n  frequency: 0.04,\n  phaseOffset: 1.0,\n  angleOffset: 60\n}];\nvar time = 0;\nfunction animate() {\n  canvas.width = window.innerWidth;\n  canvas.height = window.innerHeight;\n  ctx.clearRect(0, 0, canvas.width, canvas.height);\n  waveConfigs.forEach(function (config) {\n    var amplitude = config.amplitude,\n      frequency = config.frequency,\n      phaseOffset = config.phaseOffset,\n      angleOffset = config.angleOffset;\n    ctx.beginPath();\n    ctx.moveTo(0, canvas.height / 2);\n    for (var x = 0; x < canvas.width; x++) {\n      var y = amplitude * Math.sin(frequency * x + phaseOffset + time) + canvas.height / 2;\n      ctx.lineTo(x, y);\n    }\n    ctx.strokeStyle = \"#3498db\";\n    ctx.lineWidth = 2;\n    ctx.stroke();\n    ctx.closePath();\n    time += 0.005;\n  });\n  requestAnimationFrame(animate);\n}\nanimate();\n\n//# sourceURL=webpack:///./src/entries/ancs.js?");

/***/ }),

/***/ "./src/scss/ancs.scss":
/*!****************************!*\
  !*** ./src/scss/ancs.scss ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin\n\n//# sourceURL=webpack:///./src/scss/ancs.scss?");

/***/ })

/******/ });