<h2>{{Registers state}}</h2>
<h3>{{Information about archive}}</h3>
<form name="registers" method="POST">
    <div class="row">
        <div class="two columns">
            <label for="serial">{{Series}}</label>
        </div>
        <div class="four columns">
            <input type="text" class="u-full-width" name="serial" id="serial">
        </div>
        <div class="two columns">
            <label for="isced">{{ISCED}}</label>
        </div>
        <div class="four columns">
            <select class="u-full-width" name="isced" id="isced">
                <option value="">{{Select}}</option>
                <option value="ISCED2">ISCED2</option>
                <option value="ISCED3">ISCED3</option>
                <option value="ISCED4a">ISCED4a</option>
                <option value="ISCED4b">ISCED4b</option>
                <option value="ISCED5">ISCED5</option>
                <option value="ISCED6">ISCED6</option>
                <option value="ISCED7">ISCED7</option>
                <option value="ISCED8">ISCED8</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="two columns">
            <label for="start_date">{{Start Date}}</label>
        </div>
        <div class="four columns">
            <input type="date" class="u-full-width button" name="start_date" id="start_date">
        </div>
        <div class="two columns">
            <label for="end_date">{{End Date}}</label>
        </div>
        <div class="four columns">
            <input type="date" class="u-full-width button" name="end_date" id="end_date">
        </div>
    </div>
    <div class="row">
        <div class="two columns">
            <label for="nr_registries">{{Number of registries}}</label>
        </div>
        <div class="four columns">
            <input type="number" class="u-full-width" name="nr_registries" id="nr_registries">
        </div>
        <div class="two columns">
            <label for="nr_registrations">{{Number of registrations}}</label>
        </div>
        <div class="four columns">
            <input type="number" class="u-full-width" name="nr_registrations" id="nr_registrations">
        </div>
    </div>
    <div class="row">
        <div class="two columns">
            <label for="language">{{Language}}</label>
        </div>
        <div class="four columns">
            <select class="u-full-width" name="language" id="language">
                <option value="">{{Select}}</option>
                <!-- language -->
            </select>
        </div>
        <div class="two columns">
            <label for="archive_state">{{The state of archive}}</label>
        </div>
        <div class="four columns">
            <select class="u-full-width" name="archive_state" id="archive_state">
                <option value="">{{Select}}</option>
                <!-- archive_state -->
            </select>
        </div>
    </div>
    <div class="row">
        <div class="two columns">
            <label for="on_hold">{{From other institution}}</label>
        </div>
        <div class="four columns">
            <input type="checkbox" class="left" name="on_hold" id="on_hold">
        </div>
    </div>
    <input type="button" name="submit" value="{{Add}}" onclick="stages.add();">
</form>
<h3>{{Preview}}</h3>
<table class="u-full-width">
    <thead>
        <tr>
            <th class='width-10p'>{{Serial}}</th>
            <th class='width-10p'>{{ISCED}}</th>
            <th class='width-15p'>{{Start Date}}</th>
            <th class='width-15p'>{{End Date}}</th>
            <th class='width-10p'>{{Number of registries}}</th>
            <th class='width-10p'>{{Number of registrations}}</th>
            <th class='width-20p'>{{Language}}</th>
            <th class='width-10p'>{{Remove}}</th>
    </thead>
    <tbody id="registers">
        <!-- registers -->
    </tbody>
</table>
<input type="button" name="submit" value="Next" onclick="stages.registers();">