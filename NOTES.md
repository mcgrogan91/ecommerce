# Development notes

9/20/21:   
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
 
## End of session notes
I'm definitely rusty with Laravel.  A good chunk of the time was spent
in the documentation for getting the base project set up. 
I actually started at 7 PM working on my old Macbook Air, 
and fought with getting that running what I needed before 
giving up and using a different machine.
  
 Actually building out the application hasn't been super tricky.  It took
 a little bit of time to decipher the schema and realize `products`.`admin_id` was the foreign key for `users`.`id`
 which made everything else sort of click, since it talked about the logged in user owning things.
