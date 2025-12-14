import Navigation from '@/components/Navigation';
import { useLanguage } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import { Play, Pause, Upload, Trash2 } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { useState, useRef } from 'react';
import { Input } from '@/components/ui/input';
import { toast } from '@/hooks/use-toast';

interface Track {
  id: string;
  title: string;
  artist: string;
  duration: string;
  isPlaying?: boolean;
}

const Music = () => {
  const { t } = useLanguage();
  const { isAdmin } = useAuth();
  
  const [tracks, setTracks] = useState<Track[]>([
    { id: '1', title: 'Midnight Dreams', artist: 'Portfolio Artist', duration: '3:45', isPlaying: false },
    { id: '2', title: 'Electric Soul', artist: 'Portfolio Artist', duration: '4:20', isPlaying: false },
    { id: '3', title: 'Ocean Waves', artist: 'Portfolio Artist', duration: '5:15', isPlaying: false },
    { id: '4', title: 'City Lights', artist: 'Portfolio Artist', duration: '3:58', isPlaying: false },
    { id: '5', title: 'Northern Glow', artist: 'Portfolio Artist', duration: '4:42', isPlaying: false },
  ]);

  const togglePlay = (id: string) => {
    setTracks(tracks.map(track => ({
      ...track,
      isPlaying: track.id === id ? !track.isPlaying : false
    })));
  };

  const handleDelete = (id: string) => {
    setTracks(tracks.filter(t => t.id !== id));
  };

  return (
    <div className="min-h-screen bg-background">
      <Navigation />
      
      <main className="pt-32 pb-20 px-6">
        <div className="container mx-auto max-w-4xl">
          {/* Header */}
          <div className="text-center mb-16 animate-fade-in-up">
            <h1 className="font-display text-4xl md:text-6xl aluminum-text mb-4">
              {t('music')}
            </h1>
            <p className="text-muted-foreground">{t('featuredTracks')}</p>
            <div className="w-24 h-px bg-gradient-to-r from-transparent via-aluminum to-transparent mx-auto mt-4" />
          </div>

          {/* Admin File Uploader */}
          {isAdmin && (
            <div className="aluminum-surface rounded-xl p-6 mb-8 animate-fade-in">
              <div className="flex items-center gap-4 mb-4">
                <Upload className="w-5 h-5 text-aluminum" />
                <h3 className="font-display text-lg aluminum-text">Upload Music</h3>
              </div>
              <div className="flex flex-col sm:flex-row gap-4">
                <Input
                  type="file"
                  accept="audio/*"
                  className="bg-background border-aluminum/20 focus:border-aluminum/40 file:bg-aluminum/10 file:border-0 file:text-foreground file:mr-4 file:px-4 file:py-2 file:rounded-md file:cursor-pointer"
                  onChange={(e) => {
                    const file = e.target.files?.[0];
                    if (file) {
                      const newTrack = {
                        id: Date.now().toString(),
                        title: file.name.replace(/\.[^/.]+$/, ''),
                        artist: 'Jaganos AI',
                        duration: '0:00',
                        isPlaying: false
                      };
                      setTracks([newTrack, ...tracks]);
                      toast({
                        title: "Track uploaded",
                        description: `${file.name} has been added to the playlist`,
                      });
                      e.target.value = '';
                    }
                  }}
                />
              </div>
              <p className="text-muted-foreground text-xs mt-2">Supported formats: MP3, WAV, FLAC, AAC</p>
            </div>
          )}

          {/* Tracks List */}
          <div className="space-y-4">
            {tracks.map((track, index) => (
              <div
                key={track.id}
                className="group aluminum-surface rounded-xl p-6 flex items-center gap-6 animate-fade-in hover:glow-effect transition-all duration-300"
                style={{ animationDelay: `${index * 0.1}s` }}
              >
                {/* Play Button */}
                <button
                  onClick={() => togglePlay(track.id)}
                  className="w-14 h-14 rounded-full bg-aluminum/10 flex items-center justify-center border border-aluminum/20 hover:border-aluminum/40 transition-all flex-shrink-0"
                >
                  {track.isPlaying ? (
                    <Pause className="w-5 h-5 text-aluminum" />
                  ) : (
                    <Play className="w-5 h-5 text-aluminum ml-0.5" />
                  )}
                </button>

                {/* Track Info */}
                <div className="flex-1 min-w-0">
                  <h3 className="font-display text-lg text-foreground group-hover:aluminum-text transition-colors truncate">
                    {track.title}
                  </h3>
                  <p className="text-muted-foreground text-sm">{track.artist}</p>
                </div>

                {/* Duration */}
                <span className="text-muted-foreground text-sm hidden sm:block">
                  {track.duration}
                </span>

                {/* Progress Bar (when playing) */}
                {track.isPlaying && (
                  <div className="hidden md:block w-32 h-1 bg-muted rounded-full overflow-hidden">
                    <div className="h-full w-1/3 bg-aluminum rounded-full animate-pulse" />
                  </div>
                )}

                {/* Admin Delete */}
                {isAdmin && (
                  <Button
                    variant="ghost"
                    size="icon"
                    onClick={() => handleDelete(track.id)}
                    className="text-destructive hover:text-destructive/80"
                  >
                    <Trash2 className="w-4 h-4" />
                  </Button>
                )}
              </div>
            ))}
          </div>
        </div>
      </main>
    </div>
  );
};

export default Music;
