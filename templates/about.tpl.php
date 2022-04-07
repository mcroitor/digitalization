<h3>{{About the archiving center}}</h3>
<form name="about" method="POST">
    <div class="row">
        <div class="four columns">
            <label for="institution_name">{{Institution name}}</label>
        </div>
        <div class="eight columns">
            <input type="text" class="u-full-width" name="institution_name" id="institution_name" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="institution_type">{{Institution type}}</label>
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
            <label for="district">{{District}}</label>
        </div>
        <div class="eight columns">
            <select class="u-full-width" name="region" id="district"><!-- district --></select>
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="locality">{{Locality}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="locality" id="locality" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="address">{{Address}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="address" id="address" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="responsible">{{Lastname and Firstname of Responsible}}</label>
        </div>
        <div class="eight columns">
            <input type="text"  class="u-full-width" name="responsible" id="responsible" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="phone">{{Responsible phone}}</label>
        </div>
        <div class="eight columns">
            <input type="tel"  class="u-full-width" name="phone" id="phone" />
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="email">{{Responsible email}}</label>
        </div>
        <div class="eight columns">
            <input type="email"  class="u-full-width" name="email" id="email" />
        </div>
    </div>
    <input type="button" name="submit" value="Next" onclick="stages.about();">
</form>
