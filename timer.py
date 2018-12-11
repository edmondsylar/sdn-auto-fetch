from datetime import datetime
from threading import Timer
from time import sleep

def One():
    x = datetime.today()
    y = x.replace(day=x.day+0, hour=0, minute=0, second=5, microsecond=5)
    date_t =y-x
    secs=date_t.seconds+1

    def hello_world():
        print ("Hello world!")

    t=Timer(secs, hello_world)
    t.start()


def two():
    while True:
        sleep(5)
        print ("Hello world")

two()
