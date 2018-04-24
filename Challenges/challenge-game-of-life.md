# Challenge: Asia - Game of life

### Situation

China is dealing with a big over-population. They need to plan ahead to see if they will have enough food for the next 10 years.
They need to predict how their population will grow to take the best suitable action so they don't have problems feeding their citizens.
Help them by estimating how the density of their inhabitants will evolve.

<img src="http://www.mnn.com/sites/default/files/m_pop.jpg"/>

### Problem
 * Receive a randomly generated dataset of numbers filled with 0,1 and 2.
    * 0 means an empty spot
    * 1 means a normal person
    * 2 means a sick person
 * You should try to evolve your dataset by following the rules of "the game of life".  
 * Apply these rules an amount of times specified by "iterations".
##### Rules:
1. A sick person kills the normal person next to him  
2. When there are 2 normal persons next to an empty spot, they create a new normal person  
3. When a sick person is next to two empty spaces, he dies.

| Pattern       | Evolution     |Rule      |
|:-------------:|:-------------:|:-------------:|
|     12        | 02            |   1           | 
|     21        | 20            | 1             |
|     011       | 111           | 2             |
|     110       | 111           | 2             |
|     020       | 000           | 3             |

The dataset gets evolved from left to right and every index can only be evolved once every iteration.


###### Switches 1100

### Request

| Key           | Data type     | 
|:-------------:|:-------------:| 
|    value(data)  | Array of integer        | 
|   key(iterations)   | integer        |
example:
```
{
"value": [0,1,0,2,0,1,1,2,1,0,1,0,1,0,1,2,1,0,1,2,0,1,2,0,0,1,0,2,0,1,1,2,1,0,1,0,1,0,1,2,1,0,1,2,0,1,2],
"key": 10
}
```

### Response

| Key           | Data type     |
|:-------------:|:-------------:| 
| data      | array of integer       |
example:
```
{
   "data": [1,2,3,1,2,1,2]
}
```


### Tips
##### Example

Initial dataset

```
[0,1,0,2,1,0,1,1,2,2,1,0,1,1,2]
```
First iteration

```
[0,1,0,2,0,1,1,0,2,2,0,1,1,0,2]
```
Second iteration

```
[0,1,0,0,1,1,1,1,2,2,1,1,1,1,2]
```
Third iteration

```
[0,1,0,1,1,1,1,0,2,2,0,1,1,0,2]
```

