/* This file is generated by Ziggy. */
declare module 'ziggy-js' {
  interface RouteList {
    "home": [],
    "github.redirect": [],
    "github.callback": [],
    "admin.dashboard": [],
    "admin.minigames.wordle.index": [],
    "admin.minigames.wordle.create": [],
    "admin.minigames.wordle.store": [],
    "admin.minigames.wordle.show": [
        {
            "name": "wordle",
            "required": true,
            "binding": "id"
        }
    ],
    "admin.minigames.wordle.edit": [
        {
            "name": "wordle",
            "required": true,
            "binding": "id"
        }
    ],
    "admin.minigames.wordle.update": [
        {
            "name": "wordle",
            "required": true,
            "binding": "id"
        }
    ],
    "admin.minigames.wordle.destroy": [
        {
            "name": "wordle",
            "required": true,
            "binding": "id"
        }
    ],
    "profile.edit": [],
    "profile.update": [],
    "profile.destroy": [],
    "password.edit": [],
    "password.update": [],
    "appearance": [],
    "register": [],
    "login": [],
    "password.request": [],
    "password.email": [],
    "password.reset": [
        {
            "name": "token",
            "required": true
        }
    ],
    "password.store": [],
    "verification.notice": [],
    "verification.verify": [
        {
            "name": "id",
            "required": true
        },
        {
            "name": "hash",
            "required": true
        }
    ],
    "verification.send": [],
    "password.confirm": [],
    "logout": [],
    "storage.local": [
        {
            "name": "path",
            "required": true
        }
    ]
}
}
export {};
