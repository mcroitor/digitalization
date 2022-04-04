let stages = {}

stages.about = async function () {
    let data = {"stage": "about"};
    let result = await request("/api/", data);
}

stages.description = async function () {
    let data = {"stage": "description"};
    let result = await request("/api/", data);
}

async function final() {
    let data = {"stage": "final"};
    let result = await request("/api/", data);

}

async function login() {
    let data = {"stage": "login"};
    let result = await request("/api/", data);
}

async function registers() {
    let data = {"stage": "registers"};
    let result = await request("/api/", data);
}
