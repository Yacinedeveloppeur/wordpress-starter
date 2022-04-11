/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/section/index.jsx":
/*!**********************************!*\
  !*** ./blocks/section/index.jsx ***!
  \**********************************/
/***/ (() => {

eval("var registerBlockType = wp.blocks.registerBlockType;\nvar _wp$blockEditor = wp.blockEditor,\n    RichText = _wp$blockEditor.RichText,\n    InspectorControls = _wp$blockEditor.InspectorControls,\n    MediaUpload = _wp$blockEditor.MediaUpload;\nvar ColorPicker = wp.components.ColorPicker;\nregisterBlockType(\"startertheme/section\", {\n  title: \"Section\",\n  category: \"widgets\",\n  supports: {\n    html: false\n  },\n  edit: function edit(_ref) {\n    var className = _ref.className,\n        attributes = _ref.attributes,\n        setAttributes = _ref.setAttributes;\n    return wp.element.createElement(\"div\", null, wp.element.createElement(\"div\", {\n      className: className\n    }, wp.element.createElement(\"div\", {\n      className: \"section-container-editor\"\n    }, wp.element.createElement(\"div\", {\n      className: \"first-block-section-editor\"\n    }, wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"Texte d'introduction\",\n      value: attributes.intro,\n      onChange: function onChange(intro) {\n        return setAttributes({\n          intro: intro\n        });\n      }\n    }), wp.element.createElement(\"h2\", null, wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"Titre de la section\",\n      value: attributes.title,\n      onChange: function onChange(title) {\n        return setAttributes({\n          title: title\n        });\n      }\n    })), wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"Texte de la section\",\n      value: attributes.content,\n      onChange: function onChange(content) {\n        return setAttributes({\n          content: content\n        });\n      }\n    })), wp.element.createElement(\"div\", {\n      className: \"second-block-section-editor\"\n    }, wp.element.createElement(\"div\", {\n      className: \"right-section-image-editor\",\n      style: {\n        backgroundImage: \"url(\".concat(attributes.mediaURL, \")\"),\n        minHeight: \"400px\"\n      }\n    }))), wp.element.createElement(InspectorControls, null, wp.element.createElement(\"div\", {\n      className: \"inspector-controls-container-editor\"\n    }, wp.element.createElement(\"div\", null, wp.element.createElement(\"h2\", null, \"Image \\xE0 droite\"), wp.element.createElement(MediaUpload, {\n      type: \"image\",\n      onSelect: function onSelect(image) {\n        return setAttributes({\n          mediaID: image.id,\n          mediaURL: image.sizes.full.url\n        });\n      },\n      render: function render(_ref2) {\n        var open = _ref2.open;\n        return wp.element.createElement(\"button\", {\n          onClick: open\n        }, \"Choisir une image\");\n      }\n    }))))));\n  },\n  save: function save() {\n    return null;\n  }\n});\n\n//# sourceURL=webpack://startertheme/./blocks/section/index.jsx?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./blocks/section/index.jsx"]();
/******/ 	
/******/ })()
;