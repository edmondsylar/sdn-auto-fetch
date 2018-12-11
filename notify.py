import urllib2
import re
import os
import time

lists = ['wires','cables','poles']
# print (len(lists))

if len(lists) == 3:
    msg = "Correct Answer."
    os.system('notify-send {}'.format(msg))

else:
    msg = "Wrong Answer"
    os.system('notify-send {}'.format(msg))
