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

/***/ "./blocks/sectionmessages/index.jsx":
/*!******************************************!*\
  !*** ./blocks/sectionmessages/index.jsx ***!
  \******************************************/
/***/ (() => {

eval("var registerBlockType = wp.blocks.registerBlockType;\nvar _wp$blockEditor = wp.blockEditor,\n    RichText = _wp$blockEditor.RichText,\n    InspectorControls = _wp$blockEditor.InspectorControls,\n    MediaUpload = _wp$blockEditor.MediaUpload;\nvar ColorPicker = wp.components.ColorPicker; // COMPONENTS :\n\nfunction Message(_ref) {\n  var classNameContainer = _ref.classNameContainer,\n      src = _ref.src,\n      classNameImg = _ref.classNameImg,\n      placeholder = _ref.placeholder,\n      value = _ref.value,\n      onChange = _ref.onChange;\n  return wp.element.createElement(\"div\", {\n    className: classNameContainer + \" messages-editor\"\n  }, wp.element.createElement(RichText, {\n    tagName: \"div\",\n    placeholder: placeholder,\n    value: value,\n    onChange: onChange\n  }), wp.element.createElement(\"img\", {\n    src: src,\n    className: classNameImg,\n    width: \"50px\"\n  }));\n}\n\nfunction UploadImg(_ref2) {\n  var numberMsg = _ref2.numberMsg,\n      onSelect = _ref2.onSelect;\n  return wp.element.createElement(\"div\", null, wp.element.createElement(\"h2\", null, \"Image message \", numberMsg), wp.element.createElement(MediaUpload, {\n    type: \"image\",\n    onSelect: onSelect,\n    render: function render(_ref3) {\n      var open = _ref3.open;\n      return wp.element.createElement(\"button\", {\n        onClick: open\n      }, \"Choisir une image\");\n    }\n  }));\n}\n\nregisterBlockType(\"startertheme/sectionmessages\", {\n  title: \"Section avec messages\",\n  category: \"widgets\",\n  supports: {\n    html: false\n  },\n  edit: function edit(_ref4) {\n    var className = _ref4.className,\n        attributes = _ref4.attributes,\n        setAttributes = _ref4.setAttributes;\n    // RENDER :\n    return wp.element.createElement(\"div\", null, wp.element.createElement(\"div\", {\n      className: className\n    }, wp.element.createElement(\"div\", {\n      className: \"messageOneAndTwo-container-editor\"\n    }, wp.element.createElement(Message, {\n      classNameContainer: \"messageOne-container-editor\",\n      src: attributes.mediaOneURL,\n      classNameImg: \"messageOne-img-editor\",\n      placeholder: \"Message 1\",\n      value: attributes[\"messageOne\"],\n      onChange: function onChange(messageOne) {\n        return setAttributes({\n          messageOne: messageOne\n        });\n      }\n    }), wp.element.createElement(Message, {\n      classNameContainer: \"messageTwo-container-editor\",\n      src: attributes.mediaTwoURL,\n      classNameImg: \"messageTwo-img-editor\",\n      placeholder: \"Message 2\",\n      value: attributes[\"messageTwo\"],\n      onChange: function onChange(messageTwo) {\n        return setAttributes({\n          messageTwo: messageTwo\n        });\n      }\n    })), wp.element.createElement(\"div\", {\n      className: \"main-content-center-editor\"\n    }, wp.element.createElement(\"h2\", {\n      className: \"sectionmessages-section-title-editor\"\n    }, wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"Titre de la section\",\n      value: attributes[\"title\"],\n      onChange: function onChange(title) {\n        return setAttributes({\n          title: title\n        });\n      }\n    })), wp.element.createElement(\"p\", null, wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"Texte\",\n      value: attributes[\"text\"],\n      onChange: function onChange(text) {\n        return setAttributes({\n          text: text\n        });\n      }\n    })), wp.element.createElement(\"button\", null, wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"Boutton\",\n      value: attributes[\"btn\"],\n      onChange: function onChange(btn) {\n        return setAttributes({\n          btn: btn\n        });\n      }\n    }))), wp.element.createElement(\"div\", {\n      className: \"messageThreeFourAndFive-container-editor\"\n    }, wp.element.createElement(Message, {\n      classNameContainer: \"messageThree-container-editor\",\n      src: attributes.mediaThreeURL,\n      classNameImg: \"messageThree-img-editor\",\n      placeholder: \"Message 3\",\n      value: attributes[\"messageThree\"],\n      onChange: function onChange(messageThree) {\n        return setAttributes({\n          messageThree: messageThree\n        });\n      }\n    }), wp.element.createElement(Message, {\n      classNameContainer: \"messageFour-container-editor\",\n      src: attributes.mediaFourURL,\n      classNameImg: \"messageFour-img-editor\",\n      placeholder: \"Message 4\",\n      value: attributes[\"messageFour\"],\n      onChange: function onChange(messageFour) {\n        return setAttributes({\n          messageFour: messageFour\n        });\n      }\n    }), wp.element.createElement(Message, {\n      classNameContainer: \"messageFive-container-editor\",\n      src: attributes.mediaFiveURL,\n      classNameImg: \"messageFive-img-editor\",\n      placeholder: \"Message 5\",\n      value: attributes[\"messageFive\"],\n      onChange: function onChange(messageFive) {\n        return setAttributes({\n          messageFive: messageFive\n        });\n      }\n    }))), wp.element.createElement(InspectorControls, null, wp.element.createElement(\"div\", {\n      className: \"inspector-controls-container-editor\"\n    }, wp.element.createElement(UploadImg, {\n      numberMsg: \"1\",\n      onSelect: function onSelect(imageOne) {\n        return setAttributes({\n          mediaOneID: imageOne.id,\n          mediaOneURL: imageOne.sizes.full.url\n        });\n      }\n    }), wp.element.createElement(UploadImg, {\n      numberMsg: \"2\",\n      onSelect: function onSelect(imageTwo) {\n        return setAttributes({\n          mediaTwoID: imageTwo.id,\n          mediaTwoURL: imageTwo.sizes.full.url\n        });\n      }\n    }), wp.element.createElement(UploadImg, {\n      numberMsg: \"3\",\n      onSelect: function onSelect(imageThree) {\n        return setAttributes({\n          mediaThreeID: imageThree.id,\n          mediaThreeURL: imageThree.sizes.full.url\n        });\n      }\n    }), wp.element.createElement(UploadImg, {\n      numberMsg: \"4\",\n      onSelect: function onSelect(imageFour) {\n        return setAttributes({\n          mediaFourID: imageFour.id,\n          mediaFourURL: imageFour.sizes.full.url\n        });\n      }\n    }), wp.element.createElement(UploadImg, {\n      numberMsg: \"5\",\n      onSelect: function onSelect(imageFive) {\n        return setAttributes({\n          mediaFiveID: imageFive.id,\n          mediaFiveURL: imageFive.sizes.full.url\n        });\n      }\n    }), wp.element.createElement(\"div\", null, wp.element.createElement(\"h2\", null, \"Saisissez le lien du boutton\"), wp.element.createElement(RichText, {\n      tagName: \"div\",\n      placeholder: \"https://...\",\n      value: attributes.btnLink,\n      onChange: function onChange(btnLink) {\n        return setAttributes({\n          btnLink: btnLink\n        });\n      }\n    })))));\n  },\n  save: function save() {\n    return null;\n  }\n});\n\n//# sourceURL=webpack://startertheme/./blocks/sectionmessages/index.jsx?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./blocks/sectionmessages/index.jsx"]();
/******/ 	
/******/ })()
;