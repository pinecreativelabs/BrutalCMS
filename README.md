# BrutalCMS
A lightweight flat-file databaseless content management system for the brutalist web design style. Built with PHP, with CSV and XML files to store the data.

**[BrutalCMS.com](https://www.brutalcms.com)**

## BETA RELEASE PLAN
The first version of Brutal CMS will be released in 3 stages.

1. **Stage 1: Groundwork BETA Release (COMPLETED)**: This is the first BETA version that includes basic functionality and modules ("Groundwork"). This includes user, file, and system management, and some other basic content modules. 
2. **Stage 2: Developer BETA Release**: This will be the 2nd BETA version that will add some additional modules and functionality. Documentation will be developed, and BETA testing begins. 
3. **Stage 3: Official Release**: Additional documentation, bug fixes, and front-end templates will be added.

## Getting Started
Due to the raw nature of Brutal CMS, getting started is simple.

### System Requirements 
Your server will only need PHP 5.3 or newer. No database is needed, as all data is stored in CSV and XML files. 

FTP access is recommended, but not required, as long as you have access to edit source files (such as control panel file manager). 

### Installation
1. **DOWNLOAD** the Brutal CMS package from either Github or BrutalCMS.com. 
2. **EXTRACT** and upload the package to the directory where you’d like your application to run.
3. **LOGIN** to BOS as the superuser and change the default password. To access BOS (Base Operating System), navigate to **my-application.com/bos**. 

Use the following login credentials: 

*username:* **bosadmin**

*password:* **rootpass**

It is strongly advised to immediately change your password. Once logged in, “boot” up BOS, and you’ll see a key icon within the “WHOAMI” pane. You can change your password here.

### User Logins
There are four accounts that come pre-configured. Below are their usernames / passwords:
- **bosadmin** / rootpass
- **admin** / pass333
- **editor** / pass333
- **member** / pass333

Each account has different access permissions to BOS. 

### Running BOS Within a Subdirectory
You can run BOS within a subdirectory, such as: **my-application.com/*my-subfolder*/bos**.

However, you will need to modify the sysconfig.php file, found at:

**/bos/sat/sos/sysconfig.php**

Here, you’ll need to specify the BASE_DIR variable. This is the name of the sub-folder you’re running BOS in.

Simply modify the following line of code from: 

```
define('BASE_DIR', '');
```
to 
```
define('BASE_DIR', 'my-subfolder');
```
