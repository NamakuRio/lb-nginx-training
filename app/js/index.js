const express = require("express");
const { locale } = require("moment");
const moment = require("moment");

const PORT = process.argv[2] || 3021;
const appName = process.argv[3] || "app-1";

const app = express();
app.set("trust proxy", ["uniquelocal"]);

const commonHandler = (req, res) => {
    const timestamp = moment().format("MMMM Do YYYY, hh:mm:ss a");
    const { url, method, hostname, headers } = req;
    const data = {
        message: `hello world from ${appName}`,
        requestPayload: {
            url,
            method,
            hostname,
            headers,
        },
        timestamp,
    };
    res.setHeader("Content-Type", "application/json");
    res.send(JSON.stringify(data));
};
app.get("/", commonHandler);
app.get("/ipHash", commonHandler);
app.get("/leastConn", commonHandler);
app.get("/metadata", (req, res) => {
    const timestamp = moment().format("MMMM Do YYYY, h:mm:ss a");
    const data = {
        description: "Just an example metadata.",
        external_url:
            "https://avatars.githubusercontent.com/u/34277951?s=60&v=4",
        image: "https://avatars.githubusercontent.com/u/34277951?s=60&v=4",
        name: "Profile Picture",
        timestamp,
    };
    res.send(JSON.stringify(data));
});
app.listen(PORT, () => console.log(`This app is running on ${PORT}`));
