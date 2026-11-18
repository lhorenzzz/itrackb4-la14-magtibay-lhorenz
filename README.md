# GameHub: Authentication and Route Protection (LA14)

GameHub is a Laravel 12 application for browsing game recommendations. This lab added registration, login, logout, route protection, and navbar controls that change depending on whether the visitor is signed in.

## F1. Authentication vs. authorisation

**Authentication** answers who the visitor is. This lesson gave GameHub registration, login, and logout, so the application can now identify a signed-in user and show their name.
**Authorisation** answers what that user is allowed to do. It is still missing: right now any signed-in user can create, edit, or delete any game, and no roles or ownership rules exist yet.

## F2. Why `session()->regenerate()` after login

After a successful `Auth::attempt()`, GameHub calls `$request->session()->regenerate()` to issue a new session ID. If it were skipped, an attacker who planted a known session ID in the victim's browser beforehand (session fixation) would keep that same ID after the victim logs in, and could use it to act as the victim. Regenerating makes the ID the attacker knows worthless.

## F3. Same message for wrong password and unknown email

`LoginController@store` returns "The provided credentials do not match our records." in both cases. If the messages differed, a stranger could probe the login form to learn which emails are registered in GameHub (user enumeration) and then focus on guessing those accounts' passwords. A single generic message reveals nothing about which part was wrong.

## F4. Why index and show are public

In GameHub, `games.index` and `games.show` only read data, so letting guests browse and view game details is harmless and makes the catalogue useful to anyone. `create`, `store`, `edit`, `update`, and `destroy` change the data, so they are attached to the `auth` middleware through `middlewareFor`, and only signed-in users can reach them.

## F5. Why hiding buttons is not enough

Wrapping Add, Edit, and Delete in `@auth` only changes what the page displays. A guest can still type `/games/create` or `/games/1/edit` into the address bar, or send a request directly, and the server would respond if nothing checked it. What actually stops a stranger is the `auth` middleware on the routes, which redirects guests to the login page before the controller runs (shown in screenshot 19).

## F6. Why the login route must be named exactly `login`

When a guest requests a protected route, the `auth` middleware redirects them using `route('login')`, so it looks up a route with that exact name. In screenshot 20 the GET route was renamed to `signin`, so the lookup failed and Laravel threw `Route [login] not defined` instead of showing the login page. The same name is also used in the navbar for guests, so the error can appear on other pages as well.
