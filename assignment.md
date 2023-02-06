<h1>Programming assignment for Full Stack developer – VodafoneZiggo</h1>

This assignment is related to managing and storing telephone numbers in our front-end, API’s and databases.
In our applications and telephone system, we identify multiple way’s of representing telephone numbers. They can be presented as single numbers and/or number ranges. 
Sometimes when number lists are shared between departments/systems, they may contain a multitude of numbers and/or number ranges in different formats. In our databases we try to limit the number of entries, so we store entries as number blocks.</br>
</br>
<li>Example 1: a mobile number block of size 100 will be stored as follows. 316123456, This block thus contains the numbers 31612345600 up to and including 31612345699.</br>
<li>Example 2: a number block of size 10 for Landline numbers is stored as follows: 3110987656
</br></li>
</br>
Please note, number ranges never exceed the size of 10.000</br>
The problem is that some of our customers deliver data as single numbers, number blocks, or, even worse, a combination of both. Next to this, the number(s) are not always in the same format!</br>

Note, in NL all phonenumbers (exept servicenumbers) are of length 9 + the country code or leading 0.

<h3>The assignment</h3>
<li>Create a simple webpage using react that allows for an upload of a csv file with a set of numbers and number blocks (example file attached).
<li>After the upload, the file should be processed, resulting in a presentation (on-screen) of an optimized and ordered list of number blocks.
<li>The presented list must use the E.164 standard. Eg. +31881212500 for a single number or +31881212xxx for a size 1000 number block.
</li></br>
If you have questions, we want you to make an assumption and continue the application with this assumption.</br>
Please note that there are multiple solutions to this problem. The goal is to determine your level of expertise and have a good understanding of your thinking patterns. For us, that is the most important.</br>
If you are up to the challenge, try this assignment in PHP. In this case, you can assume the file is already uploaded and stored in a location your PHP script can access.


