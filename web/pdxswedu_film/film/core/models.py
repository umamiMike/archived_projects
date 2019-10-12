from django.db import models

# Create your models here.
class Video(models.Model):
    """ Class to store videos for presentation """

    name = models.CharField(max_length=200)
    url = models.URLField(max_length=200)
    start = models.SmallIntegerField(blank=True)
    end = models.SmallIntegerField(blank=True)
    service = models.CharField(max_length=100)
    slug = models.SlugField(max_length=50)

class Prompt(models.Model):
    video = models.ForeignKey("Video", on_delete=models.CASCADE)
    text = models.TextField()
    
