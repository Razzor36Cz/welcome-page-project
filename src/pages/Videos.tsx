import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { Play, Upload, Trash2 } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { useState } from 'react';
import { Input } from '@/components/ui/input';
import { toast } from '@/hooks/use-toast';
import { usePageBackground } from '@/hooks/usePageBackground';
import PageBackground from '@/components/PageBackground';
import AdminBackgroundUploader from '@/components/AdminBackgroundUploader';
import EditableText from '@/components/EditableText';

interface Video {
  id: string;
  title: string;
  thumbnail: string;
  duration: string;
}

const Videos = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();
  const { background, updateBackground, clearBackground } = usePageBackground('videos');
  
  const [videos, setVideos] = useState<Video[]>([
    { id: '1', title: 'Project Alpha', thumbnail: '', duration: '2:45' },
    { id: '2', title: 'Night Lights', thumbnail: '', duration: '3:20' },
    { id: '3', title: 'Urban Flow', thumbnail: '', duration: '4:15' },
    { id: '4', title: 'Nature Dreams', thumbnail: '', duration: '2:58' },
    { id: '5', title: 'Abstract Motion', thumbnail: '', duration: '3:42' },
    { id: '6', title: 'Digital World', thumbnail: '', duration: '5:10' },
  ]);

  const handleDelete = (id: string) => {
    setVideos(videos.filter(v => v.id !== id));
  };

  return (
    <div className="min-h-screen bg-background relative">
      <PageBackground background={background} />
      <Navigation />
      
      <main className="pt-32 pb-20 px-6">
        <div className="container mx-auto">
          {/* Header */}
          <div className="text-center mb-16 animate-fade-in-up">
            <EditableText as="h1" className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('videoGallery')}
            </EditableText>
            <EditableText as="p" className="text-muted-foreground">{t('latestWorks')}</EditableText>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto mt-4" />
          </div>

          {/* Admin File Uploader */}
          {isAdmin && (
            <div className="aluminum-surface rounded-xl p-6 mb-8 animate-fade-in">
              <div className="flex items-center gap-4 mb-4">
                <Upload className="w-5 h-5 text-aluminum" />
                <EditableText as="h3" className="font-display text-lg aluminum-text">Upload Video</EditableText>
              </div>
              <div className="flex flex-col sm:flex-row gap-4">
                <Input
                  type="file"
                  accept="video/*"
                  className="bg-background border-aluminum/20 focus:border-aluminum/40 file:bg-aluminum/10 file:border-0 file:text-foreground file:mr-4 file:px-4 file:py-2 file:rounded-md file:cursor-pointer"
                  onChange={(e) => {
                    const file = e.target.files?.[0];
                    if (file) {
                      const newVideo = {
                        id: Date.now().toString(),
                        title: file.name.replace(/\.[^/.]+$/, ''),
                        thumbnail: '',
                        duration: '0:00'
                      };
                      setVideos([newVideo, ...videos]);
                      toast({
                        title: "Video uploaded",
                        description: `${file.name} has been added to the gallery`,
                      });
                      e.target.value = '';
                    }
                  }}
                />
              </div>
              <EditableText as="p" className="text-muted-foreground text-xs mt-2">Supported formats: MP4, WebM, MOV</EditableText>
            </div>
          )}

          {/* Video Grid */}
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {videos.map((video, index) => (
              <div
                key={video.id}
                className="group aluminum-surface rounded-xl overflow-hidden animate-fade-in"
                style={{ animationDelay: `${index * 0.1}s` }}
              >
                {/* Thumbnail */}
                <div className="aspect-video bg-obsidian relative overflow-hidden">
                  <div className="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent" />
                  
                  {/* Play Button */}
                  <div className="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div className="w-16 h-16 rounded-full bg-aluminum/20 backdrop-blur-sm flex items-center justify-center border border-aluminum/30 group-hover:glow-effect transition-all duration-300">
                      <Play className="w-6 h-6 text-foreground ml-1" />
                    </div>
                  </div>

                  {/* Duration */}
                  <span className="absolute bottom-3 right-3 text-xs text-foreground/80 bg-background/60 backdrop-blur-sm px-2 py-1 rounded">
                    {video.duration}
                  </span>
                </div>

                {/* Info */}
                <div className="p-4 flex items-center justify-between">
                  <EditableText as="h3" className="font-display text-lg text-foreground group-hover:aluminum-text transition-colors">
                    {video.title}
                  </EditableText>
                  
                  {isAdmin && (
                    <Button
                      variant="ghost"
                      size="icon"
                      onClick={() => handleDelete(video.id)}
                      className="text-destructive hover:text-destructive/80"
                    >
                      <Trash2 className="w-4 h-4" />
                    </Button>
                  )}
                </div>
              </div>
            ))}
          </div>
        </div>
      </main>

      {isAdmin && (
        <AdminBackgroundUploader
          onUpload={updateBackground}
          onClear={clearBackground}
          hasBackground={!!background}
        />
      )}
    </div>
  );
};

export default Videos;
