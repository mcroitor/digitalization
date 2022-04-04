<form>
    <div class="row">
        <div class="two columns">
            <label for="username">{{username}}</label>
        </div>
        <div class="four columns">
            <input type="text" class="u-full-width" name="username" id="username" />
        </div>
    </div>
    <div class="row">
        <div class="two columns">
            <label for="password">{{password}}</label>
        </div>
        <div class="four columns">
            <input type="password" class="u-full-width" name="password" id="password" />
        </div>
    </div>
    <div class="row">
        <input type="button" class="button-primary six columns" value="{{Login}}" onclick="stages.login();">
    </div>
</form>
