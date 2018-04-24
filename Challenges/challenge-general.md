# Challenge: How to send requests

### Situation

##### THE EARLY BIRD…
All challenges are validated via restful web requests. You have to be able to send and receive those. Smart hackers will have a web server ready to go, so they only need to implement the problem’s solution and make it available for a call from our validator services…

##### FIRST CALL US, THEN WE’LL CALL YOU
Every validator is hidden from public access. To get a validation attempt, you must notify us of:

* the challenge you wish to validate
* the publicly reachable endpoint where our validator can call your algorithm.
* All requests need to be authenticated by your personal access token. Don’t share your token with other groups!
* For ngrok help, please visit: <a href="https://www.tothepoint.company/blog/ngrok/">this blog</a>
* our endpoint is http://central.35.190.2.232.nip.io/check?challenge=asia&token=mytoken&endpoint=someNgrokEndpoint`

##### THE VALIDATION PROCES
The validator will try to send multiple challenges to the stated endpoint and compares the solution to it’s own. Each challenge has it’s own request format which you need to be able to parse and feed to your algorithm. Your response will also vary for each challenge. If all results match, your challenge is completed and you will see the scores update and the agony on your fellow hackers faces as they get notified of your success…

<img src="https://www.tothepoint.company/img/htf/how_to_validate_challenges_htf.jpg"/>
