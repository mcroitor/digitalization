let stages = {};

stages.about = async function () {
    let data = {
        "stage": "about",
        "center": {
            "name": get("institution_name").value,
            "type": get("institution_type").value,
            "district": get("district").value,
            "locality": get("locality").value,
            "address": get("address").value,
            "responsible": get("responsible").value,
            "phone": get("phone").value,
            "email": get("email").value,
        }
    };
    let result = await request("/api/", data);
    if (result.stage !== "about") {
        window.location.href = "/?stage=" + result.stage;
    }
};

stages.description = async function () {
    let data = { "stage": "description" };
    let result = await request("/api/", data);
    if (result.stage !== "description") {
        window.location.href = "/?stage=" + result.stage;
    }
};

stages.thankyou = async function () {
    let data = { "stage": "thankyou" };
    let result = await request("/api/", data);
    console.log("[debug] " + result);
    if (result.stage !== "thankyou") {
        window.location.href = "/?stage=" + result.stage;
    }
};

stages.login = async function () {
    let data = {
        "stage": "login",
        "username": get("username").value,
        "password": get("password").value,
    };
    let result = await request("/api/", data);
    if (result.stage !== "login") {
        window.location.href = "/?stage=" + result.stage;
    }
};

stages.registers = async function () {
    let data = { "stage": "registers", "action": "next" };
    let result = await request("/api/", data);
    if (result.stage !== "registers") {
        window.location.href = "/?stage=" + result.stage;
    }
};

stages.add = async function () {
    let data = {
        "stage": "registers",
        "action": "add",
        "register": {
            "serial": get("serial").value,
            "isced": get("isced").value,
            "start_date": get("start_date").value,
            "end_date": get("end_date").value,
            "nr_registries": get("nr_registries").value,
            "nr_registrations": get("nr_registrations").value,
            "language": get("language").value,
            "state": get("archive_state").value,
            "on_hold": get("on_hold").value,
        }
    };
    let result = await request("/api/", data);
    if (result.stage !== "registers") {
        window.location.href = "/?stage=" + result.stage;
    }
    let registers = get("registers");
    registers.appendChild(createRegisterElement(result.message[0]));
};

stages.remove = async function (id) {
    let data = {
        "stage": "registers",
        "action": "remove",
        "id": id
    };
    let result = await request("/api/", data);
    if (result.stage !== "registers") {
        window.location.href = "/?stage=" + result.stage;
    }
    get("register_" + id).remove();
};

function createRegisterElement(data) {
    console.log("[debug] " + data);
    let tr = _d.createElement("tr");
    tr.addAttribute("id", "register_" + data.id);
    let td = _d.createElement("td");
    td.innerHTML = data.serial;
    tr.appendChild(td);
    td = _d.createElement("td");
    td.innerHTML = data.isced;
    tr.appendChild(td);
    td = _d.createElement("td");
    td.innerHTML = data.start_date;
    tr.appendChild(td);
    td = _d.createElement("td");
    td.innerHTML = data.end_date;
    tr.appendChild(td);
    td = _d.createElement("td");
    td.innerHTML = data.nr_registries;
    tr.appendChild(td);
    td = _d.createElement("td");
    td.innerHTML = data.nr_registrations;
    tr.appendChild(td);
    td = _d.createElement("td");
    td.innerHTML = data.language;
    tr.appendChild(td);
    td = _d.createElement("td");
    td.innerHTML = '<a href="#" onclick="stages.remove(' + data.id +
        ');"><img src="theme/default/icons/delete.svg" class="height-20"></a>';
    tr.appendChild(td);
    return tr;
}

function switchLanguage(option){
    window.location.href = "/?lang=" + option.value;
}