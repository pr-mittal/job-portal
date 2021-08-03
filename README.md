# job portal
 Connect daily wage worker with opportunities

### Features : 

- Segregating workers based on ratings from customers, experience, job profile and location 
- List of customers for workers to chat (outsourced) and fix wage and time of job
- Separate dashboard for admin , customer and worker

### Interface :

#### ADMIN

![image](https://user-images.githubusercontent.com/56964828/128017061-a24860fc-7a07-4606-a62b-c673ef2a47aa.png)
![image](https://user-images.githubusercontent.com/56964828/128017182-f56015f0-3f60-4852-b92a-c921b318b5fc.png)

Admin dashboard to block a user from accessing profile or deleting user from database.

#### CITIZEN

| dashboard                                               | ![image](https://user-images.githubusercontent.com/56964828/128017355-c51ee986-bc27-4b47-95ee-5cf0997fbc2e.png) |
| :------------------------------------------------------ | ------------------------------------------------------------ |
| update profile                                          | ![image](https://user-images.githubusercontent.com/56964828/128017323-548f27c8-bf94-4b88-a673-321360e80e27.png) |
| post a job requirement on portal                        | ![image](https://user-images.githubusercontent.com/56964828/128017305-a08d461d-1906-49f6-9854-970fcfbc882a.png) |
| find a job seeker and sort based on specific categories | ![image](https://user-images.githubusercontent.com/56964828/128017386-8659609d-1ef5-4fd9-9f88-32aab2e9279c.png) |
| give rating to past jobbers(request sent by them)       | ![image](https://user-images.githubusercontent.com/56964828/128017273-27edab56-b949-402a-a462-0247ee1e4868.png) |
| see the past job requirements posted , delete them      | ![image](https://user-images.githubusercontent.com/56964828/128017289-7c0edb13-0aee-47d4-9bac-7fe855ab542a.png) |
| see profile of job seeker                               | ![image](https://user-images.githubusercontent.com/56964828/128017248-7e626f41-aa2f-49ae-8713-86de6cea9ab9.png) |

#### WORKER

| work availability in proximity | ![image](https://user-images.githubusercontent.com/56964828/128017219-ec2069a0-27ea-43fa-ab36-4319e7512d3e.png) |
| ------------------------------ | ------------------------------------------------------------ |
| update profile                 | ![image](https://user-images.githubusercontent.com/56964828/128017234-d6d19b5f-cc32-414c-b8ab-dbb7d057fd27.png) |

### Installation :

1. Install XAMPP and run  php and apache server

2. Move the folder in C:\xampp\htdocs and on web browser write localhost/job-portal

3. Setting up data base.(or import database from sql/job-portal.sql)

   1. Create database of name "job-portal"

   2. citizens (table name)

      | uid  | name | contact | address | city | state | pic  | email |
      | ---- | ---- | ------- | ------- | ---- | ----- | ---- | ----- |
      | Vc   | Vc   | Vc      | Vc      | Vc   | Vc    | Vc   | vc    |

      PHP file : php/citizen/profile-citizen-process.php

   3. workers

      | uid  | email | wname | cnumber | firmshop | city | address | stat | category | spl  | exp  | otherinfo | apic | ppic | total | count |
      | ---- | ----- | ----- | ------- | -------- | ---- | ------- | ---- | -------- | ---- | ---- | --------- | ---- | ---- | ----- | ----- |
      | Vc   | Vc    | Vc    | Vc      | Vc       | Vc   | Vc      | Vc   | Vc       | Vc   | Vc   | Vc        | Vc   | Vc   | int   | int   |

       

      PHP file: php/worker/profile-worker-process.php

   4. requirements

      | rid                          | cust_uid | category | problem | location | city | state | dop  |
      | ---------------------------- | -------- | -------- | ------- | -------- | ---- | ----- | ---- |
      | int-primary key  (auto fill) | Vc       | Vc       | Vc      | Vc       | Vc   | Vc    | date |

      PHP file :php/citizen/dash-citizen-postWork.php

   5. users

      | uid  | email | mobile | pwd  | category | dos  | status |
      | ---- | ----- | ------ | ---- | -------- | ---- | ------ |
      | Vc   | Vc    | Vc     | Vc   | Vc       | date | int    |

      PHP file: php/signin-signup/signup.php

   6. ratings

      | citizenUid | workerUid |
      | ---------- | --------- |
      | Vc         | Vc        |

      PHP file : php/worker/send-rating-request.php

   

Refer to [project plan.docx](https://github.com/SiliconMerc/job-portal/blob/main/project-plan.docx) for more details and frameworks.

Languages : HTML , CSS , JS , JQUERY , ANGULAR JS , PHP

Software Used : XAMPP , VS Code

Most important thing is to have fun :)

