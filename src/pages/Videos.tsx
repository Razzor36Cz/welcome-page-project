import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { Play, Plus, Trash2 } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { useState } from 'react';

interface Video {
  id: string;
  title: string;
  thumbnail: string;
  duration: string;
}

const Videos = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();
  
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
    <div className="min-h-screen bg-background">
      <Navigation />
      
      <main className="pt-32 pb-20 px-6">
        <div className="container mx-auto">
          {/* Header */}
          <div className="text-center mb-16 animate-fade-in-up">
            <h1 className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('videoGallery')}
            </h1>
            <p className="text-muted-foreground">{t('latestWorks')}</p>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto mt-4" />
          </div>

          {/* Admin Add Button */}
          {isAdmin && (
            <div className="flex justify-end mb-8">
              <Button variant="luxury" className="gap-2">
                <Plus className="w-4 h-4" />
                Add Video
              </Button>
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
                  <h3 className="font-display text-lg text-foreground group-hover:aluminum-text transition-colors">
                    {video.title}
                  </h3>
                  
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
    </div>
  );
};

export default Videos;
