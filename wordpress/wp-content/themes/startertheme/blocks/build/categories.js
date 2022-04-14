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

/***/ "./blocks/categories/index.jsx":
/*!*************************************!*\
  !*** ./blocks/categories/index.jsx ***!
  \*************************************/
/***/ (() => {

eval("var registerBlockType = wp.blocks.registerBlockType;\nvar withSelect = wp.data.withSelect;\nvar apiFetch = wp.apiFetch.apiFetch;\nvar _wp$blockEditor = wp.blockEditor,\n    RichText = _wp$blockEditor.RichText,\n    InspectorControls = _wp$blockEditor.InspectorControls,\n    MediaUpload = _wp$blockEditor.MediaUpload;\nvar authorName = \"\";\nvar categories = \"\";\nregisterBlockType(\"startertheme/categories\", {\n  title: \"Catégories\",\n  category: \"widgets\",\n  supports: {\n    html: false\n  },\n  edit: withSelect(function (select) {\n    categories = select(\"core\").getEntityRecords(\"taxonomy\", \"category\");\n    return {\n      categories: categories\n    };\n  })(function (_ref) {\n    var className = _ref.className,\n        attributes = _ref.attributes,\n        setAttributes = _ref.setAttributes;\n\n    if (!categories) {\n      return wp.element.createElement(\"p\", {\n        className: className\n      }, \"Loadding...\");\n    }\n\n    if (categories.lenght === 0) {\n      return wp.element.createElement(\"p\", {\n        className: className\n      }, \"Pas de cat\\xE9gorie\");\n    }\n\n    return wp.element.createElement(\"div\", {\n      className: className\n    }, wp.element.createElement(\"h2\", {\n      className: \"categories-section-title-editor\"\n    }, wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"Titre de la section\",\n      value: attributes.title,\n      onChange: function onChange(title) {\n        return setAttributes({\n          title: title\n        });\n      }\n    })), wp.element.createElement(\"div\", {\n      className: \"categories-cards-container-editor\"\n    }, categories.map(function (category) {\n      if (category.name != \"Non classé\") return wp.element.createElement(\"div\", {\n        \"class\": \"categories-card-editor\"\n      }, wp.element.createElement(\"div\", {\n        className: \"categories-icon-container-editor\"\n      }, wp.element.createElement(\"img\", {\n        src: attributes.mediaURL,\n        className: \"categories-icon-editor\"\n      })), wp.element.createElement(\"h4\", null, category.name), wp.element.createElement(\"p\", null, category.description));\n    })), \" \", wp.element.createElement(InspectorControls, null, wp.element.createElement(\"div\", {\n      className: \"inspector-controls-container-editor\"\n    }, wp.element.createElement(\"div\", null, wp.element.createElement(\"h2\", null, \"Image \\xE0 droite\"), wp.element.createElement(MediaUpload, {\n      type: \"image\",\n      onSelect: function onSelect(image) {\n        return setAttributes({\n          mediaID: image.id,\n          mediaURL: image.sizes.full.url\n        });\n      },\n      render: function render(_ref2) {\n        var open = _ref2.open;\n        return wp.element.createElement(\"button\", {\n          onClick: open\n        }, \"Choisir une image\");\n      }\n    })))));\n  }),\n  save: function save() {\n    return null;\n  }\n});\n\n//# sourceURL=webpack://startertheme/./blocks/categories/index.jsx?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./blocks/categories/index.jsx"]();
/******/ 	
/******/ })()
;