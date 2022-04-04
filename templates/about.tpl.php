<h3>{{general_info}}</h3>
<form name="about" method="POST">
    <div class="row">
        <div class="four columns">
            <label for="institution_name">{{institution_name}}</label>
        </div>
        <div class="eight columns">
            <input type="text" class="u-full-width" name="institution_name" id="institution_name" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="institution_type">{{institution_type}}</label>
        </div>
        <div class="eight columns">
            <select class="u-full-width" name="institution_type" id="institution_type">
                <option value="University">{{University}}</option>
                <option value="College">{{College}}</option>
                <option value="Professional School">{{Professional School}}</option>
                <option value="Liceum">{{Liceum}}</option>
                <option value="Gimnasium">{{Gimnasium}}</option>
                <option value="Primary School">{{Primary School}}</option>
                <option value="Middle School">{{Middle School}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="district">{{district}}</label>
        </div>
        <div class="eight columns">
            <select class="u-full-width" name="region" id="district"><!-- district --></select>
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="locality">{{locality}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="locality" id="locality" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="address">{{address}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="address" id="address" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="responsible">{{responsible}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="responsible" id="responsible" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="phone">{{phone}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="phone" id="phone" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="email">{{email}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="email" id="email" />
        </div>
    </div>
    <input type="button" name="submit" value="Next" onclick="stages.about();">
</form>
