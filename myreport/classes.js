var classes = [
    {
        "name": "ProductController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "detailAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "listAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "newAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "updateAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "counting",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 29,
        "ccn": 21,
        "ccnMethodMax": 6,
        "externals": [
            "AbstractController",
            "PDO",
            "ProductRepo",
            "CategoryRepo",
            "ReviewRepo",
            "CountingRepo",
            "WishlistRepo",
            "ImageService",
            "FilterService",
            "reviewController",
            "View",
            "View",
            "View",
            "View"
        ],
        "parents": [
            "AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 298,
        "vocabulary": 52,
        "volume": 1698.73,
        "difficulty": 24.38,
        "effort": 41421.38,
        "level": 0.04,
        "bugs": 0.57,
        "time": 2301,
        "intelligentContent": 69.67,
        "number_operators": 65,
        "number_operands": 233,
        "number_operators_unique": 9,
        "number_operands_unique": 43,
        "cloc": 6,
        "loc": 134,
        "lloc": 128,
        "mi": 44.69,
        "mIwoC": 28.59,
        "commentWeight": 16.1,
        "kanDefect": 1.27,
        "relativeStructuralComplexity": 729,
        "relativeDataComplexity": 0.05,
        "relativeSystemComplexity": 729.05,
        "totalStructuralComplexity": 6561,
        "totalDataComplexity": 0.43,
        "totalSystemComplexity": 6561.43,
        "package": "\\",
        "pageRank": 0.02,
        "afferentCoupling": 2,
        "efferentCoupling": 11,
        "instability": 0.85,
        "violations": {}
    },
    {
        "name": "AbstractController",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getParam",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getParams",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 7,
        "ccnMethodMax": 5,
        "externals": [
            "Db"
        ],
        "parents": [
            "Db"
        ],
        "implements": [],
        "lcom": 2,
        "length": 36,
        "vocabulary": 7,
        "volume": 101.06,
        "difficulty": 16.67,
        "effort": 1684.41,
        "level": 0.06,
        "bugs": 0.03,
        "time": 94,
        "intelligentContent": 6.06,
        "number_operators": 11,
        "number_operands": 25,
        "number_operators_unique": 4,
        "number_operands_unique": 3,
        "cloc": 0,
        "loc": 27,
        "lloc": 27,
        "mi": 53.8,
        "mIwoC": 53.8,
        "commentWeight": 0,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 6,
        "relativeSystemComplexity": 6,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 12,
        "totalSystemComplexity": 12,
        "package": "\\",
        "pageRank": 0.05,
        "afferentCoupling": 7,
        "efferentCoupling": 1,
        "instability": 0.13,
        "violations": {}
    },
    {
        "name": "ReviewController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkUserOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 11,
        "ccn": 9,
        "ccnMethodMax": 6,
        "externals": [
            "AbstractController",
            "PDO",
            "ReviewRepo",
            "BasketRepo",
            "UserOrderRepo",
            "ProductController"
        ],
        "parents": [
            "AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 78,
        "vocabulary": 18,
        "volume": 325.25,
        "difficulty": 14.5,
        "effort": 4716.19,
        "level": 0.07,
        "bugs": 0.11,
        "time": 262,
        "intelligentContent": 22.43,
        "number_operators": 20,
        "number_operands": 58,
        "number_operators_unique": 6,
        "number_operands_unique": 12,
        "cloc": 0,
        "loc": 46,
        "lloc": 46,
        "mi": 44.93,
        "mIwoC": 44.93,
        "commentWeight": 0,
        "kanDefect": 0.73,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.23,
        "relativeSystemComplexity": 81.23,
        "totalStructuralComplexity": 243,
        "totalDataComplexity": 0.7,
        "totalSystemComplexity": 243.7,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "MainController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "main",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 6,
        "ccnMethodMax": 6,
        "externals": [
            "AbstractController",
            "ProductController",
            "ProductController",
            "className",
            "ProductController"
        ],
        "parents": [
            "AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 61,
        "vocabulary": 20,
        "volume": 263.64,
        "difficulty": 10.5,
        "effort": 2768.19,
        "level": 0.1,
        "bugs": 0.09,
        "time": 154,
        "intelligentContent": 25.11,
        "number_operators": 22,
        "number_operands": 39,
        "number_operators_unique": 7,
        "number_operands_unique": 13,
        "cloc": 0,
        "loc": 38,
        "lloc": 38,
        "mi": 47.78,
        "mIwoC": 47.78,
        "commentWeight": 0,
        "kanDefect": 0.43,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 16.6,
        "totalStructuralComplexity": 32,
        "totalDataComplexity": 1.2,
        "totalSystemComplexity": 33.2,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "UserController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "loginAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "signInAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "detailAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "loginQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLanLonFromAddress",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 28,
        "ccn": 20,
        "ccnMethodMax": 6,
        "externals": [
            "AbstractController",
            "PDO",
            "User",
            "UserRepo",
            "WishlistRepo",
            "ImageService",
            "View",
            "View",
            "View",
            "View"
        ],
        "parents": [
            "AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 371,
        "vocabulary": 72,
        "volume": 2289.04,
        "difficulty": 20.71,
        "effort": 47415.87,
        "level": 0.05,
        "bugs": 0.76,
        "time": 2634,
        "intelligentContent": 110.51,
        "number_operators": 81,
        "number_operands": 290,
        "number_operators_unique": 9,
        "number_operands_unique": 63,
        "cloc": 0,
        "loc": 137,
        "lloc": 137,
        "mi": 27.18,
        "mIwoC": 27.18,
        "commentWeight": 0,
        "kanDefect": 1.2,
        "relativeStructuralComplexity": 576,
        "relativeDataComplexity": 0.18,
        "relativeSystemComplexity": 576.18,
        "totalStructuralComplexity": 5184,
        "totalDataComplexity": 1.64,
        "totalSystemComplexity": 5185.64,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "WishlistController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "AbstractController",
            "PDO",
            "WishlistRepo"
        ],
        "parents": [
            "AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 33,
        "vocabulary": 12,
        "volume": 118.3,
        "difficulty": 9.29,
        "effort": 1098.53,
        "level": 0.11,
        "bugs": 0.04,
        "time": 61,
        "intelligentContent": 12.74,
        "number_operators": 7,
        "number_operands": 26,
        "number_operators_unique": 5,
        "number_operands_unique": 7,
        "cloc": 0,
        "loc": 23,
        "lloc": 23,
        "mi": 55.38,
        "mIwoC": 55.38,
        "commentWeight": 0,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.08,
        "relativeSystemComplexity": 9.08,
        "totalStructuralComplexity": 27,
        "totalDataComplexity": 0.25,
        "totalSystemComplexity": 27.25,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CheckOutController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "listAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkAddressAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "confirmPurchaseAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkoutSuccessAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addToBasketAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "historyAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reduceProductAmount",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkLastInputAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkUserQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 11,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 11,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 26,
        "ccn": 16,
        "ccnMethodMax": 5,
        "externals": [
            "AbstractController",
            "PDO",
            "BasketRepo",
            "UserOrderRepo",
            "ProductRepo",
            "PdfService",
            "MailService",
            "View",
            "View",
            "View",
            "View",
            "View"
        ],
        "parents": [
            "AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 204,
        "vocabulary": 44,
        "volume": 1113.72,
        "difficulty": 20.96,
        "effort": 23340.47,
        "level": 0.05,
        "bugs": 0.37,
        "time": 1297,
        "intelligentContent": 53.14,
        "number_operators": 41,
        "number_operands": 163,
        "number_operators_unique": 9,
        "number_operands_unique": 35,
        "cloc": 0,
        "loc": 107,
        "lloc": 107,
        "mi": 32.25,
        "mIwoC": 32.25,
        "commentWeight": 0,
        "kanDefect": 1.03,
        "relativeStructuralComplexity": 729,
        "relativeDataComplexity": 0.04,
        "relativeSystemComplexity": 729.04,
        "totalStructuralComplexity": 8019,
        "totalDataComplexity": 0.46,
        "totalSystemComplexity": 8019.46,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 8,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "ImageService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "validateImage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "uploadImage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "cropImage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteImage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 14,
        "ccn": 11,
        "ccnMethodMax": 5,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 3,
        "length": 194,
        "vocabulary": 67,
        "volume": 1176.82,
        "difficulty": 11.67,
        "effort": 13729.58,
        "level": 0.09,
        "bugs": 0.39,
        "time": 763,
        "intelligentContent": 100.87,
        "number_operators": 61,
        "number_operands": 133,
        "number_operators_unique": 10,
        "number_operands_unique": 57,
        "cloc": 3,
        "loc": 85,
        "lloc": 82,
        "mi": 49.62,
        "mIwoC": 35.27,
        "commentWeight": 14.35,
        "kanDefect": 0.85,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 3.63,
        "relativeSystemComplexity": 4.63,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 14.5,
        "totalSystemComplexity": 18.5,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "FilterService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSearchedQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCategoryQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMinQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMaxQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStarQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCityQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFilterQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAllQueries",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "gettingOrderByQuery",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 11,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 11,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 30,
        "ccn": 20,
        "ccnMethodMax": 10,
        "externals": [
            "AbstractController"
        ],
        "parents": [
            "AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 226,
        "vocabulary": 60,
        "volume": 1334.96,
        "difficulty": 12,
        "effort": 16019.49,
        "level": 0.08,
        "bugs": 0.44,
        "time": 890,
        "intelligentContent": 111.25,
        "number_operators": 70,
        "number_operands": 156,
        "number_operators_unique": 8,
        "number_operands_unique": 52,
        "cloc": 0,
        "loc": 111,
        "lloc": 111,
        "mi": 30.81,
        "mIwoC": 30.81,
        "commentWeight": 0,
        "kanDefect": 1.68,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 3.11,
        "relativeSystemComplexity": 12.11,
        "totalStructuralComplexity": 99,
        "totalDataComplexity": 34.25,
        "totalSystemComplexity": 133.25,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "Db",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "connectDB",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO",
            "DbConfig",
            "PDO"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 10,
        "vocabulary": 4,
        "volume": 20,
        "difficulty": 3.5,
        "effort": 70,
        "level": 0.29,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 5.71,
        "number_operators": 3,
        "number_operands": 7,
        "number_operators_unique": 2,
        "number_operands_unique": 2,
        "cloc": 0,
        "loc": 11,
        "lloc": 11,
        "mi": 68.04,
        "mIwoC": 68.04,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.2,
        "relativeSystemComplexity": 16.2,
        "totalStructuralComplexity": 16,
        "totalDataComplexity": 0.2,
        "totalSystemComplexity": 16.2,
        "package": "\\",
        "pageRank": 0.2,
        "afferentCoupling": 7,
        "efferentCoupling": 2,
        "instability": 0.22,
        "violations": {}
    },
    {
        "name": "MailService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "createMail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "PHPMailer\\PHPMailer\\PHPMailer"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 55,
        "vocabulary": 26,
        "volume": 258.52,
        "difficulty": 2.87,
        "effort": 741.85,
        "level": 0.35,
        "bugs": 0.09,
        "time": 41,
        "intelligentContent": 90.09,
        "number_operators": 11,
        "number_operands": 44,
        "number_operators_unique": 3,
        "number_operands_unique": 23,
        "cloc": 17,
        "loc": 48,
        "lloc": 31,
        "mi": 90.15,
        "mIwoC": 50.31,
        "commentWeight": 39.84,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 49.5,
        "totalStructuralComplexity": 49,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 49.5,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "PdfService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createPdf",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createProductsTable",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "PDO",
            "BasketRepo",
            "UserOrderRepo",
            "Dompdf\\Options",
            "Dompdf\\Dompdf"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 168,
        "vocabulary": 69,
        "volume": 1026.23,
        "difficulty": 7.51,
        "effort": 7705.02,
        "level": 0.13,
        "bugs": 0.34,
        "time": 428,
        "intelligentContent": 136.68,
        "number_operators": 35,
        "number_operands": 133,
        "number_operators_unique": 7,
        "number_operands_unique": 62,
        "cloc": 1,
        "loc": 49,
        "lloc": 48,
        "mi": 52.95,
        "mIwoC": 41.97,
        "commentWeight": 10.98,
        "kanDefect": 0.38,
        "relativeStructuralComplexity": 625,
        "relativeDataComplexity": 0.12,
        "relativeSystemComplexity": 625.12,
        "totalStructuralComplexity": 1875,
        "totalDataComplexity": 0.35,
        "totalSystemComplexity": 1875.35,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 5,
        "instability": 0.83,
        "violations": {}
    },
    {
        "name": "UserOrder",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setIsOrdered",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIsOrdered",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUserId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLastUpdate",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastUpdate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 4,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Db",
            "User",
            "UserRepo"
        ],
        "parents": [
            "Db"
        ],
        "implements": [],
        "lcom": 1,
        "length": 44,
        "vocabulary": 14,
        "volume": 167.52,
        "difficulty": 4.23,
        "effort": 708.17,
        "level": 0.24,
        "bugs": 0.06,
        "time": 39,
        "intelligentContent": 39.63,
        "number_operators": 13,
        "number_operands": 31,
        "number_operators_unique": 3,
        "number_operands_unique": 11,
        "cloc": 10,
        "loc": 60,
        "lloc": 55,
        "mi": 75.88,
        "mIwoC": 46.33,
        "commentWeight": 29.56,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 2.12,
        "relativeSystemComplexity": 6.12,
        "totalStructuralComplexity": 44,
        "totalDataComplexity": 23.33,
        "totalSystemComplexity": 67.33,
        "package": "\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "User",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setWhatUser",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getWhatUser",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setProfileImg",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProfileImg",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUsername",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUsername",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCaption",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCaption",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFirstname",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFirstname",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLastname",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastname",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setBirthday",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBirthday",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStreet",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStreet",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setHouseNumber",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getHouseNumber",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCity",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCity",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPostalCode",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPostalCode",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLat",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLat",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLon",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLon",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLastUpdate",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastUpdate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProducts",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 36,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 16,
        "nbMethodsSetters": 16,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Db",
            "ProductRepo"
        ],
        "parents": [
            "Db"
        ],
        "implements": [],
        "lcom": 1,
        "length": 132,
        "vocabulary": 27,
        "volume": 627.65,
        "difficulty": 3.8,
        "effort": 2385.05,
        "level": 0.26,
        "bugs": 0.21,
        "time": 133,
        "intelligentContent": 165.17,
        "number_operators": 37,
        "number_operands": 95,
        "number_operators_unique": 2,
        "number_operands_unique": 25,
        "cloc": 38,
        "loc": 187,
        "lloc": 168,
        "mi": 63.88,
        "mIwoC": 31.73,
        "commentWeight": 32.15,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 6.48,
        "relativeSystemComplexity": 10.48,
        "totalStructuralComplexity": 144,
        "totalDataComplexity": 233.33,
        "totalSystemComplexity": 377.33,
        "package": "\\",
        "pageRank": 0.09,
        "afferentCoupling": 6,
        "efferentCoupling": 2,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "Product",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUserId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCategoryId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCategoryId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCategory",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setIsAccepted",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIsAccepted",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStarAverage",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStarAverage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAmount",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAmount",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPrize",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrize",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setImagePath",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getImagePath",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setName",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDescription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDescription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLastUpdate",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastUpdate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getReviews",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 27,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 9,
        "nbMethodsSetters": 11,
        "wmc": 7,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Db",
            "User",
            "UserRepo",
            "Category",
            "CategoryRepo",
            "ReviewRepo"
        ],
        "parents": [
            "Db"
        ],
        "implements": [],
        "lcom": 1,
        "length": 106,
        "vocabulary": 23,
        "volume": 479.5,
        "difficulty": 3.62,
        "effort": 1735.32,
        "level": 0.28,
        "bugs": 0.16,
        "time": 96,
        "intelligentContent": 132.49,
        "number_operators": 30,
        "number_operands": 76,
        "number_operators_unique": 2,
        "number_operands_unique": 21,
        "cloc": 26,
        "loc": 141,
        "lloc": 128,
        "mi": 65.99,
        "mIwoC": 35.13,
        "commentWeight": 30.86,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 3.85,
        "relativeSystemComplexity": 12.85,
        "totalStructuralComplexity": 243,
        "totalDataComplexity": 104,
        "totalSystemComplexity": 347,
        "package": "\\",
        "pageRank": 0.02,
        "afferentCoupling": 2,
        "efferentCoupling": 6,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Wishlist",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUserId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setProductId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProductId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProduct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLastUpdate",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastUpdate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 12,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 4,
        "wmc": 5,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Db",
            "User",
            "UserRepo",
            "Product",
            "ProductRepo"
        ],
        "parents": [
            "Db"
        ],
        "implements": [],
        "lcom": 1,
        "length": 50,
        "vocabulary": 15,
        "volume": 195.34,
        "difficulty": 4.38,
        "effort": 854.63,
        "level": 0.23,
        "bugs": 0.07,
        "time": 47,
        "intelligentContent": 44.65,
        "number_operators": 15,
        "number_operands": 35,
        "number_operators_unique": 3,
        "number_operands_unique": 12,
        "cloc": 10,
        "loc": 65,
        "lloc": 60,
        "mi": 73.58,
        "mIwoC": 45.04,
        "commentWeight": 28.55,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 2.44,
        "relativeSystemComplexity": 6.44,
        "totalStructuralComplexity": 48,
        "totalDataComplexity": 29.33,
        "totalSystemComplexity": 77.33,
        "package": "\\",
        "pageRank": 0.03,
        "afferentCoupling": 1,
        "efferentCoupling": 5,
        "instability": 0.83,
        "violations": {}
    },
    {
        "name": "Counting",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setName",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAmount",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAmount",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 2,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 17,
        "vocabulary": 7,
        "volume": 47.73,
        "difficulty": 2.4,
        "effort": 114.54,
        "level": 0.42,
        "bugs": 0.02,
        "time": 6,
        "intelligentContent": 19.89,
        "number_operators": 5,
        "number_operands": 12,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 6,
        "loc": 30,
        "lloc": 27,
        "mi": 88.82,
        "mIwoC": 56.89,
        "commentWeight": 31.94,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 3.4,
        "relativeSystemComplexity": 3.4,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 17,
        "totalSystemComplexity": 17,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "Review",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setProductId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProductId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUserId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStars",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStars",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTitle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTitle",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setComment",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getComment",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 16,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 6,
        "nbMethodsSetters": 7,
        "wmc": 3,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Db",
            "User",
            "UserRepo"
        ],
        "parents": [
            "Db"
        ],
        "implements": [],
        "lcom": 1,
        "length": 59,
        "vocabulary": 14,
        "volume": 224.63,
        "difficulty": 3.5,
        "effort": 786.22,
        "level": 0.29,
        "bugs": 0.07,
        "time": 44,
        "intelligentContent": 64.18,
        "number_operators": 17,
        "number_operands": 42,
        "number_operators_unique": 2,
        "number_operands_unique": 12,
        "cloc": 14,
        "loc": 84,
        "lloc": 77,
        "mi": 71.81,
        "mIwoC": 42.25,
        "commentWeight": 29.56,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 2.81,
        "relativeSystemComplexity": 6.81,
        "totalStructuralComplexity": 64,
        "totalDataComplexity": 45,
        "totalSystemComplexity": 109,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Basket",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setOrderId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrderId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setProductId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProductId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProduct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAmount",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAmount",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLastUpdate",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastUpdate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 14,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 5,
        "wmc": 5,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Db",
            "UserOrder",
            "UserOrderRepo",
            "Product",
            "ProductRepo"
        ],
        "parents": [
            "Db"
        ],
        "implements": [],
        "lcom": 1,
        "length": 55,
        "vocabulary": 13,
        "volume": 203.52,
        "difficulty": 3.55,
        "effort": 721.59,
        "level": 0.28,
        "bugs": 0.07,
        "time": 40,
        "intelligentContent": 57.4,
        "number_operators": 16,
        "number_operands": 39,
        "number_operators_unique": 2,
        "number_operands_unique": 11,
        "cloc": 12,
        "loc": 75,
        "lloc": 69,
        "mi": 72.63,
        "mIwoC": 43.59,
        "commentWeight": 29.04,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 2.79,
        "relativeSystemComplexity": 6.79,
        "totalStructuralComplexity": 56,
        "totalDataComplexity": 39,
        "totalSystemComplexity": 95,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Category",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setName",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 1,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 10,
        "vocabulary": 6,
        "volume": 25.85,
        "difficulty": 1.75,
        "effort": 45.24,
        "level": 0.57,
        "bugs": 0.01,
        "time": 3,
        "intelligentContent": 14.77,
        "number_operators": 3,
        "number_operands": 7,
        "number_operators_unique": 2,
        "number_operands_unique": 4,
        "cloc": 4,
        "loc": 20,
        "lloc": 18,
        "mi": 94.53,
        "mIwoC": 62.59,
        "commentWeight": 31.94,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 2.33,
        "relativeSystemComplexity": 2.33,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 7,
        "totalSystemComplexity": 7,
        "package": "\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "DbConfig",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getDbName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 9,
        "vocabulary": 5,
        "volume": 20.9,
        "difficulty": 0.75,
        "effort": 15.67,
        "level": 1.33,
        "bugs": 0.01,
        "time": 1,
        "intelligentContent": 27.86,
        "number_operators": 3,
        "number_operands": 6,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 6,
        "loc": 22,
        "lloc": 19,
        "mi": 98.91,
        "mIwoC": 62.73,
        "commentWeight": 36.18,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 3,
        "relativeSystemComplexity": 3,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 9,
        "totalSystemComplexity": 9,
        "package": "\\",
        "pageRank": 0.12,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "View",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "view",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "cache",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clearCache",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "compileCode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "includeFiles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "compilePHP",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "compileEchos",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "compileEscapedEchos",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "compileBlock",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "compileYield",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 10,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 10,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 20,
        "ccn": 11,
        "ccnMethodMax": 5,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 10,
        "length": 163,
        "vocabulary": 40,
        "volume": 867.47,
        "difficulty": 12.73,
        "effort": 11040.58,
        "level": 0.08,
        "bugs": 0.29,
        "time": 613,
        "intelligentContent": 68.16,
        "number_operators": 43,
        "number_operands": 120,
        "number_operators_unique": 7,
        "number_operands_unique": 33,
        "cloc": 0,
        "loc": 87,
        "lloc": 87,
        "mi": 35.64,
        "mIwoC": 35.64,
        "commentWeight": 0,
        "kanDefect": 1.35,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 4.5,
        "relativeSystemComplexity": 5.5,
        "totalStructuralComplexity": 10,
        "totalDataComplexity": 45,
        "totalSystemComplexity": 55,
        "package": "\\",
        "pageRank": 0.03,
        "afferentCoupling": 3,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "WishlistRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findById",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findAllFromUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByUserProductId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByProductId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addToWishlist",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteOutWishlist",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteAllFromProduct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 7,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO",
            "Wishlist",
            "Wishlist"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 121,
        "vocabulary": 19,
        "volume": 514,
        "difficulty": 5.94,
        "effort": 3053.76,
        "level": 0.17,
        "bugs": 0.17,
        "time": 170,
        "intelligentContent": 86.51,
        "number_operators": 20,
        "number_operands": 101,
        "number_operators_unique": 2,
        "number_operands_unique": 17,
        "cloc": 0,
        "loc": 70,
        "lloc": 70,
        "mi": 40.63,
        "mIwoC": 40.63,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.77,
        "relativeSystemComplexity": 36.77,
        "totalStructuralComplexity": 288,
        "totalDataComplexity": 6.14,
        "totalSystemComplexity": 294.14,
        "package": "\\",
        "pageRank": 0.02,
        "afferentCoupling": 3,
        "efferentCoupling": 2,
        "instability": 0.4,
        "violations": {}
    },
    {
        "name": "UserOrderRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findById",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkLastInputAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrderedUserOrders",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 5,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO",
            "UserOrder"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 81,
        "vocabulary": 16,
        "volume": 324,
        "difficulty": 4.71,
        "effort": 1527.43,
        "level": 0.21,
        "bugs": 0.11,
        "time": 85,
        "intelligentContent": 68.73,
        "number_operators": 15,
        "number_operands": 66,
        "number_operators_unique": 2,
        "number_operands_unique": 14,
        "cloc": 0,
        "loc": 51,
        "lloc": 51,
        "mi": 45.04,
        "mIwoC": 45.04,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.57,
        "relativeSystemComplexity": 36.57,
        "totalStructuralComplexity": 216,
        "totalDataComplexity": 3.43,
        "totalSystemComplexity": 219.43,
        "package": "\\",
        "pageRank": 0.02,
        "afferentCoupling": 4,
        "efferentCoupling": 2,
        "instability": 0.33,
        "violations": {}
    },
    {
        "name": "ReviewRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByProductId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createReview",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "updateReviewStars",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteProductReviews",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "userReviewsFromProduct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 5,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 95,
        "vocabulary": 21,
        "volume": 417.27,
        "difficulty": 4.26,
        "effort": 1778.89,
        "level": 0.23,
        "bugs": 0.14,
        "time": 99,
        "intelligentContent": 97.88,
        "number_operators": 14,
        "number_operands": 81,
        "number_operators_unique": 2,
        "number_operands_unique": 19,
        "cloc": 0,
        "loc": 53,
        "lloc": 53,
        "mi": 43.9,
        "mIwoC": 43.9,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.77,
        "relativeSystemComplexity": 16.77,
        "totalStructuralComplexity": 96,
        "totalDataComplexity": 4.6,
        "totalSystemComplexity": 100.6,
        "package": "\\",
        "pageRank": 0.02,
        "afferentCoupling": 3,
        "efferentCoupling": 1,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "CountingRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "countFilterAmount",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 34,
        "vocabulary": 18,
        "volume": 141.78,
        "difficulty": 2.8,
        "effort": 396.98,
        "level": 0.36,
        "bugs": 0.05,
        "time": 22,
        "intelligentContent": 50.63,
        "number_operators": 6,
        "number_operands": 28,
        "number_operators_unique": 3,
        "number_operands_unique": 15,
        "cloc": 0,
        "loc": 16,
        "lloc": 16,
        "mi": 58.53,
        "mIwoC": 58.53,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.75,
        "relativeSystemComplexity": 9.75,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 1.5,
        "totalSystemComplexity": 19.5,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "UserRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findById",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByUsername",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO",
            "User"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 148,
        "vocabulary": 30,
        "volume": 726.22,
        "difficulty": 4.86,
        "effort": 3527.35,
        "level": 0.21,
        "bugs": 0.24,
        "time": 196,
        "intelligentContent": 149.52,
        "number_operators": 12,
        "number_operands": 136,
        "number_operators_unique": 2,
        "number_operands_unique": 28,
        "cloc": 0,
        "loc": 63,
        "lloc": 63,
        "mi": 40.58,
        "mIwoC": 40.58,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 1.1,
        "relativeSystemComplexity": 26.1,
        "totalStructuralComplexity": 125,
        "totalDataComplexity": 5.5,
        "totalSystemComplexity": 130.5,
        "package": "\\",
        "pageRank": 0.05,
        "afferentCoupling": 5,
        "efferentCoupling": 2,
        "instability": 0.29,
        "violations": {}
    },
    {
        "name": "ProductRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findAll",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByFilter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findAllUserProducts",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findById",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createProduct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editProduct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reduceAmountAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteProduct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 8,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 173,
        "vocabulary": 29,
        "volume": 840.43,
        "difficulty": 8.6,
        "effort": 7224.47,
        "level": 0.12,
        "bugs": 0.28,
        "time": 401,
        "intelligentContent": 97.77,
        "number_operators": 24,
        "number_operands": 149,
        "number_operators_unique": 3,
        "number_operands_unique": 26,
        "cloc": 0,
        "loc": 84,
        "lloc": 84,
        "mi": 37.41,
        "mIwoC": 37.41,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.94,
        "relativeSystemComplexity": 36.94,
        "totalStructuralComplexity": 324,
        "totalDataComplexity": 8.43,
        "totalSystemComplexity": 332.43,
        "package": "\\",
        "pageRank": 0.1,
        "afferentCoupling": 5,
        "efferentCoupling": 1,
        "instability": 0.17,
        "violations": {}
    },
    {
        "name": "CategoryRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findById",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findAll",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO",
            "Category"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 31,
        "vocabulary": 10,
        "volume": 102.98,
        "difficulty": 3,
        "effort": 308.94,
        "level": 0.33,
        "bugs": 0.03,
        "time": 17,
        "intelligentContent": 34.33,
        "number_operators": 7,
        "number_operands": 24,
        "number_operators_unique": 2,
        "number_operands_unique": 8,
        "cloc": 0,
        "loc": 25,
        "lloc": 25,
        "mi": 55.28,
        "mIwoC": 55.28,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 36.38,
        "totalStructuralComplexity": 108,
        "totalDataComplexity": 1.14,
        "totalSystemComplexity": 109.14,
        "package": "\\",
        "pageRank": 0.02,
        "afferentCoupling": 2,
        "efferentCoupling": 2,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "BasketRepo",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByProductId",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findAllFromUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "countAllProducts",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addToBasket",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteOutBasket",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 5,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "PDO"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 18,
        "volume": 400.31,
        "difficulty": 5.06,
        "effort": 2026.58,
        "level": 0.2,
        "bugs": 0.13,
        "time": 113,
        "intelligentContent": 79.07,
        "number_operators": 15,
        "number_operands": 81,
        "number_operators_unique": 2,
        "number_operands_unique": 16,
        "cloc": 0,
        "loc": 54,
        "lloc": 54,
        "mi": 43.85,
        "mIwoC": 43.85,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.67,
        "relativeSystemComplexity": 36.67,
        "totalStructuralComplexity": 216,
        "totalDataComplexity": 4,
        "totalSystemComplexity": 220,
        "package": "\\",
        "pageRank": 0.02,
        "afferentCoupling": 3,
        "efferentCoupling": 1,
        "instability": 0.25,
        "violations": {}
    }
]