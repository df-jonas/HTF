# Challenge: North-America - Repeated digits

### Situation

North america has developed a secret system to identify terrorists who try to enter the country. They don't want the terorrists to know so they can track them incase they want to.
The system revolves around adding a series of repeating digits in their Social Security number. Now they need help automating the detection of those repeating digits.

<img src="http://magarticles.magzter.com/articles/1642/201216/5862164e6588a/Guessing-AttackBypasses-CreditCard-Security-in-6-Seconds.jpg"/>

### Problem

Does the `String` of digits contain a sequence of three digits that are the same. 

##### Rules:

###### Switches: 1101

### Request

| Key           | Data type     | 
|:-------------:|:-------------:| 
| value         | String        | 

example:
```
{
"value": "1234567423456789456789765334567"}
```

### Response

| Key           | Data type     |
|:-------------:|:-------------:| 
| value         |   boolean     |
example:
```
{
   "value": false
}
```


### Tips

