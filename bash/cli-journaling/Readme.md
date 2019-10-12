# Project Name

##### _A Fun little command line journaling project._

#### Author:  Mike Chastain   

## Description   

_journaling takes many forms for me.  The goal is to have the simplest way for me to remember things and recall them as necessary.  It is also a way for me learn Bash scripting_.

## Setup
clone and add the following to your .bashrc or .bash_profile (or whatever you use)
```
export PATH = $PATH:/path/to/repo

```


# How to use

## set your config in .journal file
```
root="/path/to/your/journals/root/directory"
editor="vim" //can set to whatever you would open from your terminal

```

## journal
Will append what is in the quotes, with a timestamp, to the document docToAppendTo
If there is no doToAppendTo it will make one.

```
journal docToAppendTo "I had a thought about something
```
## remember

Uses ``` cat ``` and ``` grep ``` to search through ALL docs in your journal, will return all lines which contain instances of the string "something"

```
remember something
```


## Technologies Used

_Bash_

## To Do



### Legal



Copyright (c) 2016 Mike Chastain.  

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
