<?php

const APP = ROOT . "/app";
const VIEWS = APP.'/Views';
const CONTROLLERS_PATH = APP.'/Controllers';
const MODELS = APP.'/Models';
const APP_ENV = 'local';
const APPNAME = 'Great Shopaholic';
const SLOGAN = "Let's Build Cool Site";
const LOGS = ROOT.'/logs';
const DB_CONFIG_FILE = ROOT.'/config/db.php';

define('ROUTES', require ROOT.'/config/routes.php');