# Development notes

## 9/20/21:   
 * Started: 7 (8):05 PM   
 * Stopped: 10:18 PM
 
 Complete:
 1. Build out database structure and models.
 2. Auth
 3. Basic product display page using repository
     (Would be nice to paginate)
  
 TODO:
 1. Get test suite working.  It didn't like something about my config.
 2. Section D or E of doc
 3. More repositories to support that
 4. Cleaning up where the user lands/navigation
 5. Stretch: Redo some things in Vue?
 
### End of session notes
I'm definitely rusty with Laravel.  A good chunk of the time was spent
in the documentation for getting the base project set up. 
I actually started at 7 PM working on my old Macbook Air, 
and fought with getting that running what I needed before 
giving up and using a different machine.
  
 Actually building out the application hasn't been super tricky.  It took
 a little bit of time to decipher the schema and realize `products`.`admin_id` was the foreign key for `users`.`id`
 which made everything else sort of click, since it talked about the logged in user owning things.

## 9/21/21
 * Start: 3:30 PM
 * End: 5:30 PM (plus some for tweaks made during this write up)
 
Completed:
 1. Got test running. It wanted them in the Feature folder
 2. Section C. I didn't get to the optional part though
 3. Section D. Didn't get in the threshold filter, but that wouldn't be too hard
 4. A little bit of design clean up.  It's still not very good
 
### End of session notes

I stopped here at 2 hours to cap it at 4 hours of dev effort, ignoring the hour wasted at the beginning yesterday.
UI's are clearly not a strong suit of mine, especially when building from scratch with no guidelines based on other site design cues.
I also spent a decent amount of time playing around with Eloquent in the debugger to re-acclimate myself with some of the slightly more complex uses of it beyond simple relationships.

I definitely made some system design decisions based on the timeline that I would have liked to have done better. Key of those is doing the inventory search display/functionality in raw JS.  It would have been nice to create a vue app with components like Inventory, PaginatedTable, and SearchFilter.  I'm not proficient enough to bootstrap that in the given time, so I went with the simplest approach which was to manipulate things in JS to get it functioning.

Another area I would have liked to spend more time was implementing the optional portion of Section C.  That would likely be my next priority if I kept going, to implement more of the CRUD routes and make this an actual application.

Overall, I didn't get done quite as much as I would have liked but i'm fairly happy with the application structure/design.