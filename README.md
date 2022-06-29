# Development test

Hello there candidate! welcome to the development test for the position of junior web developer for CT Funiber Ecuador. We present you a simple challenge of a web form development that will receive some data detailed below, store it and send it by mail.

#### Fields:

1. Name    
2. Last name   
3. Email   
4. Phone   
5. Country
6. State
7. City    
8. Comments    
9. Policy Acceptance Check   
10. Areas and Programs:
    - Department of Environment and Sustainability
      - Master's Degree in Environmental Management and Audits
    - Department of Innovation, Business and New Technologies
      - Master's Degree in Strategic Management with a Specialization in Management
      - Master's Degree in Strategic Management with a Specialization in Information Technologies
      - Master's Degree in Strategic Management with a specialization in Telecommunications
    - Department of Language, Education and Communications Sciences
      - Master's Degree in Training of Teachers of Spanish as a Foreign Language
      - Master's Degree in Education with a specialization in Higher Education
      - Master's Degree in Education with a specialization in Organization and Management of Educational Centers
    - Department of Health Sciences
      - Master's Degree in Physical Activity: Training and Sports Management
      - Master's Degree in Naturopathic Sciences
    - Department of Projects
      - Master's Degree in Project Design, Management and Direction
      - Master's Degree in Design, Management and Project Management with specialization in Innovation and Products
      - Master's Degree in Design, Management and Project Management with a specialization in Architecture and Urban Planning

- All fields, except comments, are mandatory and must be properly validated. 
- For country, province and city dropdowns, open source alternatives can be used, such as:
  - https://github.com/dr5hn/countries-states-cities-database
  - https://github.com/hiiamrohit/Countries-States-Cities-database
  - it should be noted that in this case, the functionality of each dropdown is dependent on the previous one: country > province > city.
- Programs dropdown is dependent on Areas dropdown.
- The form must send an e-mail to the person requesting information.  
  - The sending of this mail can be spoofed through services such as mailtrap or mailhub.
- The information must be stored in a non-relational database (Optional).   
- Possible technologies to be used for front-end development: React, Vue, Angular, Javascript.
- The backend development language is at your discretion. The provided is php8

> The entire project will be checked out with Docker compose and must work with the provided dependencies by sending a pull request to this repository.   
> Any environment variables in addition to those provided must be sent in the pull request with an explanation.     
> If there are any doubts, read the requirements in the docker-compose file.  
> For this challenge you have a development time of 72 hours from the reception of the mail.  
> You can check a [form example here](https://www.figma.com/proto/RNZItqYIpXh45obZCd6Hnt/Propuesta?node-id=149%3A2&scaling=min-zoom&page-id=0%3A1&hotspot-hints=0&hide-ui=1)