# Blood Donors Community Management Script

Description here...

## Documentation

In development...

## Changelog v1

- Added: Action name is red if it is incoming actions status
- Fixed: Edit donor role, current role was not visible in select box
- Added: Select box for super administrator set, in change donor role modal. Super administrator has all permissions.
- Changed: Changed route organization. Now each route is in its own folder. Code is separated to traits.
- Changed: Moved Settings, Roles, Permissions controllers into own folder/namespace Settings.
- Changed: Scanned and changed to repository pattern every part in code where models where directly called
- Added: Added middleware for web installer. Removed code that check is instlled file exists in storage.
- Added: Donors sex option added.
- Changed: Changed donor avatars path, and added it in config. Now is: /app/donors/avatars. Also added config for defailt avatar image.
- Changed: Added frontend fro view folders, moved welcome file to frontend folder.
- Added: Default role added to settings. It is used in registration now.
- Fixed: If no actions, dashboard wouldnt be shown of undefined variable.
- Fixed: If action is finished, remove menu and buttons in action to notify donors and make action solved.
- Added: Send SMS to all donors who wants SMS contact about incoming action with question. 
- Show count of donors planing to come or not to come to action.
- Fixed: If donor is not selected app throws error when adding donor to success/fail list.
- Logged user can answer to action comming/not comming from interface.
- Using Laravel Elixir only one request for css and one for js is made.
- Change password for donor on donors list.