# Overview
This myBB plugin associates Morphic Characters and Forms to Morphic users, allowing them to select which character and form they're using when they post.

## Database Tables

```
`morphic_chars`
L `char_id` (pkey) Character ID, each character has a unique ID
L `user_id` (fkey, uid) User ID, references the user's myBB uid
L `name` The character's name
L `character_profile` Link to the character's application
```

```
`morphic_forms`
L `form_id` (pkey) Form ID, each form has a unique ID
L `char_id` (fkey, char_id) Character ID, ties each form to a single character
L `species` The form's species
L `active` Whether or not the form is currently active. Old forms are kept in the database so that the player doesn't lose record of player posts from when they were in them.
```

```
`morphic_posts`
L `post_id` (fkey, pid) Post ID, used to associate a post with the form it's made in.
L `form_id` (fkey, form_id) Form ID, used to associate the corresponding post_id as a Morphic post made in a unique Morphic form
```

## To-do

### Database Query Functions

* ~~Create a function to get a list of the user's current characters~~
* ~~Create a function to get a list of the character's forms~~

---

* Create a function to count the number of a form's posts
* Create a function to count the number of a character's posts
* Create a function to count the number of a player's Morphic posts

---

* Create a function to handle the database query for adding a form post
* Create a function to handle the database query for changing which form a post is made in
* ~~Create a function to handle the database query for adding a character~~
* ~~Create a function to handle the database query for updating a character~~

### Fields & Saving
* Hook into the following for handling the adding/editing of posts/threads: `newthread_do_newthread_end`, `newreply_do_newreply_end`, `editpost_do_editpost_end`, `editpost_deletepost`
* ~~Add fields to Mod CP so Arbiters can add values~~
  * ~~Load input fields for existing characters~~
  * ~~Load input fields for existing forms~~
  * ~~Create an "Add Character" button that adds a new character text input via JS~~
  * ~~Create an "Add Form" button that adds a new form text input via JS if the existing Form fields are filled~~
  * (optional) Create a checkbox for each form to toggle whether it is active or not
  * Hook into the saving of a user in the Mod CP to update database tables (~~new character, update characters, new forms~~, update forms)
  
### Templating
* ~~Add Mod CP inputs (noted above)~~
* Add character select to `newthread`, `newreply`, `quickreply`, and `editpost` templates
* Add form select to `newthread`, `newreply`, `quickreply`, and `editpost` templates
* Add part to the user info in the postbit that shows the current character name and the current form
  * (Optional) Output a little character menu sprite generated based on a `strtolower` version of the species name (depends on if I can find a set of reasonably-named files for it)
* Add sections on the User's Edit Profile screen that shows a list of characters (uneditable), but allows editing of their character application link
* Add sections on User Profile that
  * show # of total Morphic posts
  * (optional) links characters' application
  * shows # of posts per character
  * shows # of posts per form
