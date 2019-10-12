import csv,sys,os

def getFilePathRel(theFileStr):#
    script_dir =os.path.dirname(__file__)#<-- absolute dir the script is in
    rel_path = theFileStr
    abs_file_path = os.path.join(script_dir, rel_path)
    return abs_file_path


filename = getFilePathRel("toParse.txt")
outFile = open(getFilePathRel('testB.csv'), 'w+')
output = csv.writer(outFile)

with open(filename) as f:
    reader = csv.reader(f, delimiter = ' ', quotechar='|')
    try:
        for row in reader:
            print(row)
            output.writerow(row)
    except csv.Error as e:sys
        sys.exit('file {}, line {}: {}'.format(filename, reader.line_num, e))
        print("bitch")


outFile.close()
