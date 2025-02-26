<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Blog App

A simple blog application built with Laravel and Tailwind CSS. This app allows users to create, read, update, and delete blog posts.

## Features

-   Create, Read, Update, and Delete (CRUD) Posts
-   Light/Dark Mode: Toggle between light and dark themes for better readability
-   Returns posts in JSON format via a REST API
-   Includes a Blade frontend for direct viewing
-   Serves as the backend for a Vue.js application
-   Implements caching to reduce API requests and avoid rate limits

## Technologies Used

-   Backend: Laravel - PHP framework for building web applications
    Laravel ORM (Eloquent) - For database interactions and managing relationships
-   Frontend: Tailwind CSS - Utility-first CSS framework for styling
-   JavaScript: Vanilla JavaScript for dynamic functionality
-   Database: MySQL - Relational database for storing posts and other data.

## Usage

-   Send a GET request to the following endpoint to retrieve recent tweets:
    GET http://127.0.0.1:8000/api/tweets
