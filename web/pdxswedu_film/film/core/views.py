from django.shortcuts import render
from django.http import HttpResponse
from .models import *
import json


# Create your views here.
def homepage(request):
    video = Video.objects.get(pk=1)

    content = {"video": video }
    return render(request, "homepage.html", content)

def testingpage(request):
    return HttpResponse("<h1>This is some http.  it should show up</h1>")


def jsontest(request):
    return HttpResponse(
        json.dumps(['foo', {'bar': ('baz', None, 1.0, 2)}]),
        content_type="application/json"
    )

def video(request):
    video = Video.objects.get(pk=1)
    vid = {
        "name": video.name,
        "id": video.id,
        "url": video.url,
        "start": video.start,
        "end": video.end,
        "service": video.service,
    }
    return HttpResponse(json.dumps(vid),content_type="application/json")
