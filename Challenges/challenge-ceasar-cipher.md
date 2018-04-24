# Challenge: Oceania - Ceasar cipher
### Situation

There is a big weapon traffic issue between Japan and Australia. 
Japan has intel about a big shipment of weapons heading towards Australia.
The message was sent encrypted so it can't get intercepted and leaked. 
Help Australia decrypt the message so they can prevent the shipment from arriving!
<img src="http://www.freepngimg.com/download/stamp/5-2-classified-stamp-transparent.png"/>


### Problem
 * Receive encrypted sentence containing letters, numbers and special characters.
 * Decrypt the message by using the offset and send the decrypted message back.
 * The message you receive is encrypted using the offset, try to decrypt it by reverse-applying the offset
 * Rules
    * <b>Letters:</b> use decryption using the offset
    * <b>Numbers:</b> Don't change
    * <b>Special Characters:</b> Don't change

##### Switches: 0101 


### Request

| Key           | Data type     | 
|:-------------:|:-------------:| 
| value(input)     | string        | 
| key(offset)     | integer        |
example:
```
{
    "value"= "DUH ACHA HUUL MWBIIF",
    "key" = 20
}
```
### Response

| Key           | Data type     |
|:-------------:|:-------------:| 
| value      | string       |
example:
```
{
    "value": "JAN GING NAAR SCHOOL"
}
```

### Tips

```ABC``` encrypted with offset 1 becomes ```BCD```. <br>
To decrypt ```BCD```, you should apply the offset backwards so it becomes ```ABC``` again.

[Wiki](https://nl.wikipedia.org/wiki/Caesarcijfer)

##### Example

Offset 3:  
```PROGRAMMING IS FUNNY``` becomes
```SURJUDPPLQJ LV IXQQB```

| Start       | Offset 1     | Offset2       | Offset 3     |
|:-------------:|:-------------:|:-------------:|:-------------:|
|     F        | G            |     H        | <b>I</b>            | 
|     U        | V            |     W        | <b>X </b>           |
|     N       | O           |     P       | <b>Q </b>          |
|     N       | O           |     P       | <b>Q </b>          |
|     Y       | Z           |     A       | <b>B </b>   
