# Challenge: South-America Longest matching sequence

### Situation

South-america is developing a cure to counter the chemical attacks caused by terrorists. They have developed a couple of cures and ran some tests on them. Now they need to figure out which of them is the most resistent. To figure out which cure is the strongest, the scientists need to find the longest strand of dna in the test results.

<img src="http://s3.amazonaws.com/digitaltrends-uploads-prod/2016/04/DNA-double-helix.jpg"/>

### Problem

Find the longest subsequence that is present in `strandA` and `strandB.`

##### Rules:
- Position in the `String doesn't matter and when multiple sequences are tied for longest, 

###### Switches 0001


### Request

| Key           | Data type     | 
|:-------------:|:-------------:| 
| strandA     | String| 
| strandB     | String        |
example:
```
{
    "strandA": "kjldmfqsjdlmsqjaaaafkldsmqkfjldsmqfopifpezîorrlmdfkùfdjksqmf",
    "strandB": "kjmlsdqfkldmsqfidosqfijezkfldsmqfeoprzpodsklqmfkdjsqmlfjdlsqmfjdiosqfezfiaaaa"
}
```

### Response

| Key           | Data type     |
|:-------------:|:-------------:| 
| value         | String        |
example:
```
{
   "value": "aaaa"
}
```


### Tips

- Any matching substring counts, at any location
- In AI, a sequence often gets divided into tokens. Consider tokens of ever decreasing length to find the longest match.