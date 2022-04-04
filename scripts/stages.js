let stages = {};

stages.about = async function () {
    let data = {"stage": "about"};
    let result = await request("/api/", data);
    if (result.stage !== "about") {
        window.location.href = "/?stage=" + result.stage;
    }
};

stages.description = async function () {
    let data = {"stage": "description"};
    let result = await request("/api/", data);
    if (result.stage !== "description") {
        window.location.href = "/?stage=" + result.stage;
    }
};

stages.final = async function () {
    let data = {"stage": "final"};
    let result = await request("/api/", data);
    console.log("[debug] " + result);
    if (result.stage !== "final") {
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
    let data = {"stage": "registers"};
    let result = await request("/api/", data);
    if (result.stage !== "registers") {
        window.location.href = "/?stage=" + result.stage;
    }
};
