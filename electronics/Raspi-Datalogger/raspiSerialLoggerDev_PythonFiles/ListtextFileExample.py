import glob
import os
os.chdir("/mydir")
for file in glob.glob("*.txt"):
    print (file)
