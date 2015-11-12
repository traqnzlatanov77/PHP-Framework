<h1>Register</h1>

<div class="col-lg-6 col-md-offset-3 centered">
    <div class="well bs-component">
        <form class="form-horizontal" action="/account/register" method="POST">
        	<fieldset>
              <legend>User register</legend>
              <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Username</label>
                <div class="col-lg-10">
                  <input class="form-control" id="username" name="username" placeholder="Username" type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                  <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input class="form-control" id="email" name="email" placeholder="Email" type="email">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Register</button>
                  <a class="btn btn-success" href="/account/login">Login</a>
                </div>
              </div>
            </fieldset>
          </form>
    	<div style="display: none;" id="source-button" class="btn btn-primary btn-xs">&lt; &gt;</div></div>
  	</div>
</div>

<!-- <form action="/account/register" method="POST">
	<label for="username">Username:</label>
	<input id="username" type="text" name="username" />
	<br/>
	<label for="password">Password:</label>
	<input id="password" type="password" name="password" />
	<br/>
	<input type="submit" value="Register"/>
	<a href="/account/login">Login</a>
</form> -->