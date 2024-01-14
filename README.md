- [Introduction](#introduction)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

<h3>Introduction</h3>
<p> 
This project's primary focus is to create a Laravel application that seamlessly integrates with the Etsy API, enabling users to effectively manage their orders. With this application, users will have the convenience of effortlessly accessing and reviewing a list of orders retrieved from their Etsy store.
</p>

<h3>Features</h3>
<ul>
<li><b>Order Listing:</b> View a comprehensive list of orders fetched directly from Etsy.</li>
<li><b>Integration with Etsy API:</b>Utilize the power of the Etsy API to access and display order information seamlessly.</li>
</ul>

<h3>Prerequisites</h3>
<ul>
<li><b>PHP:</b> >=7.1</li>
<li><b>Laravel:</b>9+</li>
<li><b>Etsy API Key</b></li>
</ul>

<h3>Configuration</h3>
<p> At first clone this repository</p>
<pre>
git clone https://github.com/imabulhasan99/etsy-order-management.git
cd etsy-order-management
</pre>

<p>Install all dependency</p>
<pre>
composer install
</pre>

<p>Copy .env.example and rename it .env</p>

<p>Add this to your .env</p>
<pre>
ETSY_API_KEY = 'your etsy api key'
</pre>
<p>If you don't have an API key, go to <a style="color:red" href='https://www.etsy.com/developers/register'>Here</a></p>

<p>Configaure your Database in .env</p>
<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db name
DB_USERNAME=db username
DB_PASSWORD=
</pre>

<p>Generate Application key using this artisan command</p>
<pre>
php artisan key:generate
</pre>

<p>Run migration using this artisan command</p>
<pre>
php artisan migrate
</pre>
<p>Run Database Seeder using this artisan command</p>

<pre>
php artisan db:seed
</pre>
<p>
This seed command create 10 shops and a Admin User for testing
</p>
<pre>
<b>User Email:<b> admin@test.com
<b>Password:<b> 12345
</pre>

Now run your server and enjoy. 