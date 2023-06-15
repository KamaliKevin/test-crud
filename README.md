# IMPORTANT: Before testing
<p>1. Install the TCPDF package using Composer. If you don't have Composer, follow the official guide:</p>
<a href="https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos" target="_blank">Linux / Unix / macOS</a><br>
<a href="https://getcomposer.org/doc/00-intro.md#installation-windows" target="_blank">Windows</a>

<p>2. After installing Composer, you should be able to run the following command in a <b>Bash</b> terminal:</p>
<pre>composer require tecnickcom/tcpdf</pre>

<p>3. Once installed, require the <b>autoload.php</b> file inside the <b>vendor</b> folder to load the TCPDF files. The following piece of code should be put in the file that loads all the necessary assets</p>
<pre>require '[REST_OF_PATH]/vendor/autoload.php';</pre>
<p><b>[REST_OF_PATH]</b> indicates the folders/files that are before the <b>vendor</b> folder, if any</p>

<p>4. The TCPDF package should be available to use now in <b>any file</b> you want to use it</p>

# About this
<p>Based on QuickProgramming's MVC Framework. This is a version of the "remastered-test-php-mvc-framework" 
that gives the possibility to import the "users" HTML table into a downloadable Excel or PDF file.</p>

<p>Also, you will be able to do basic CRUD from implemented buttons in the <b>Home</b> page <b>once you login</b>. 
Please, be aware the <b>plain text passwords</b> of the test users are found inside the <b>docs</b> folder, in a file named <b>info-test-users.txt</b></p>

# License
This project uses the MIT License. You can find more information inside the "LICENSE.md" file or in the following link: <a href="https://opensource.org/license/MIT/" target="_blank">MIT License</a>