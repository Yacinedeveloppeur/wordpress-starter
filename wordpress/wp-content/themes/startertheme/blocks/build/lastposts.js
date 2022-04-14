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

/***/ "./blocks/lastposts/index.jsx":
/*!************************************!*\
  !*** ./blocks/lastposts/index.jsx ***!
  \************************************/
/***/ (() => {

eval("var registerBlockType = wp.blocks.registerBlockType;\nvar withSelect = wp.data.withSelect;\nvar apiFetch = wp.apiFetch.apiFetch;\nvar authorName = \"\";\nregisterBlockType(\"startertheme/lastposts\", {\n  title: \"Derniers articles\",\n  category: \"startertheme\",\n  supports: {\n    html: false\n  },\n  edit: withSelect(function (select) {\n    return {\n      posts: select(\"core\").getEntityRecords(\"postType\", \"post\", {\n        per_page: 3\n      })\n    };\n  })(function (_ref) {\n    var posts = _ref.posts,\n        className = _ref.className;\n\n    if (!posts) {\n      return wp.element.createElement(\"p\", {\n        className: className\n      }, \"Loadding...\");\n    }\n\n    if (posts.lenght === 0) {\n      return wp.element.createElement(\"p\", {\n        className: className\n      }, \"Pas d'article\");\n    }\n\n    return wp.element.createElement(\"div\", {\n      className: className\n    }, posts.map(function (post) {\n      wp.apiFetch({\n        path: \"/wp/v2/users/\".concat(post.author)\n      }).then(function (data) {\n        authorName = data.name;\n      });\n      return wp.element.createElement(\"p\", null, wp.element.createElement(\"img\", {\n        src: post.fimg_url,\n        width: \"200px\"\n      }), wp.element.createElement(\"br\", null), wp.element.createElement(\"i\", null, \"Par \", authorName, \" | \", post.date), wp.element.createElement(\"h5\", null, post.title.rendered.replace(\"&rsquo;\", \"'\")));\n    }));\n  }),\n  save: function save() {\n    return null;\n  }\n});\n\n//# sourceURL=webpack://startertheme/./blocks/lastposts/index.jsx?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./blocks/lastposts/index.jsx"]();
/******/ 	
/******/ })()
;