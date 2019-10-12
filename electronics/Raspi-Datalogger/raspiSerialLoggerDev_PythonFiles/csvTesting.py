import csv
import os
import io

qChar = ','
def openTheFileRel(theFileStr):#opens a file based on it being relative to the script calling it
    script_dir =os.path.dirname(__file__)#<-- absolute dir the script is in
    rel_path = theFileStr
    abs_file_path = os.path.join(script_dir, rel_path)
    f = open(abs_file_path,"r+")
    return f

def openTheFileRel1(theFileStr):#opens a file based on it being relative to the script calling it
    script_dir =os.path.dirname(__file__)#<-- absolute dir the script is in
    rel_path = theFileStr
    abs_file_path = os.path.join(script_dir, rel_path)
    f =  io.open(abs_file_path,"rb")
    return f

def getFilePathRel(theFileStr):#
    script_dir =os.path.dirname(__file__)#<-- absolute dir the script is in
    rel_path = theFileStr
    abs_file_path = os.path.join(script_dir, rel_path)
    return abs_file_path

def testBalls():
    print('balls')

  
def writeCSV(someiterable):
    with open(getFilePathRel+'biznatch.csv', 'w', newline='') as f:
        writer = csv.writer(f)
        writer.writerows(someiterable)
        
class myClass:
    offset = 1
    def __init__(self, value):
        self.value = value
    def get_offset_value(self):
        return self.offset + self.value

def mainLoop():

    inFile= getFilePathRel("toParse.txt")
    print(inFile)

    myFile = open(inFile,encoding='utf-8')
    #return myFile
   data = csv.reader(shit,delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
    data = shit
    for row in shit:
        print(row)
    myFile.close()

    outFile = open(getFilePathRel('test.csv'),'w')
    output=csv.writer(outFile)
    for row in data:
         theData = row
 
         output.writerow(row)
    
    output.writerow(["bitches","shitsnacks"])
    outFile.close()
