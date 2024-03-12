var config = {
    cookieName: "_csrfp_token"
};


/** Function to ensure a token is sent as a cookie **/
var csrfprotector = function (req, res, next) {
    console.log(req.csrfToken())
    res.cookie(config.cookieName, req.csrfToken(), { maxAge: 900000, httpOnly: true });
    next();
};

/** Function to modify HTML Output and add js code path **/
var csrfPMod = function (req, res, next) {
    console.log(res.body);
    next();
}

module.exports = {
    csrfprotector: csrfprotector,
    csrfpmodifer: csrfPMod
}