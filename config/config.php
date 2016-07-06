<?php

// Optional - Recommended way of organizing app files
const AREAS_DIR = ['admin' => 'areas/admin', 'front' => 'areas/front'];

// Twig template engine options
const TWIG_CACHE = false;
const TWIG_DEBUG = true;

// Default database connection info
const DB_TYPE = 'PDO'; // Available options = ['PDO', 'MongoDB']
const DB_DRIVER = 'mysql';
const DB_HOST = 'localhost';
const DB_PORT = 27017; // Required for MongoDB
const DB_NAME = 'newsget';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';